<?php

namespace App\Jobs;

use App\Helpers\StringHelper;
use App\Models\Certificate;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use KubAT\PhpSimple\HtmlDomParser;

class ScrapForCertificates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->url = config("scraping.urlSGCE");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->client = new Client();

        $response = $this->client->post("$this->url/certificados/listaCertificadosPublicosPorNome", $this->getRequestOptions());

        $dom = HtmlDomParser::str_get_html($response->getBody());

        if ($this->hasNoCertificates($dom)) {
            $this->job->delete();
        }

        if ($this->hasOnlyOnePage($dom)) {
            $this->getDataFromPage($dom);
        } else {
            $this->getDataFromPage($dom);
            $this->getDataPaginated($dom);
        }
    }

    private function getRequestOptions()
    {
        return [
            'headers' => [
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                "txtNome" => $this->user->name,
            ]
        ];
    }

    private function getDataFromPage($dom)
    {
        $table = $dom->getElementById("data_table");

        $certificatesDB = $this->getCertificatesFromDB();

        foreach ($table->children as $row) {
            if ($this->isNotTableHeader($row)) {
                if (!$this->hasTheSameCertificateOnDB($certificatesDB, $row)) {
                    $this->saveCertificateOnDB($row);
                }
            }
        }
    }

    private function getDataPaginated($dom)
    {
        $lastUrl = $dom->find("div[class=paginacao]", 0)->children[count($dom->find("div[class=paginacao]", 0)->children) - 1]->getAttribute('href');
        $lastPage = StringHelper::getText('/listaCertificadosPublicosPorNome\/(\d+)/i', $lastUrl);
        $lastPage = intval($lastPage);

        $pages = $lastPage / 15;

        for ($i = 1; $i < $pages; $i++) {
            $urlComplement = $i * 15;
            $response = $this->client->post("{$this->url}/certificados/listaCertificadosPublicosPorNome/{$urlComplement}", $this->getRequestOptions());
            $dom = HtmlDomParser::str_get_html($response->getBody());

            $this->getDataFromPage($dom);
        }
    }

    private function hasNoCertificates($dom):bool
    {
        return StringHelper::checkIfContains($dom->getElementById("data_table")->innertext(), "Não foram encontrados certificados válidos para emissão");
    }

    private function hasOnlyOnePage($dom):bool
    {
        return !StringHelper::checkIfContains($dom->find("div[class=center_table]", 0)->innertext(), "Último");
    }

    private function isNotTableHeader($row):bool
    {
        return $row->getAttribute("id") != null;
    }

    private function hasTheSameCertificateOnDB($certificatesDB, $row):bool
    {
        foreach ($certificatesDB as $certificateDB) {
            if ($row->children[2]->innertext() == $certificateDB->event) {
                return true;
            }
        }
        return false;
    }

    private function saveCertificateOnDB($row):void
    {
        $certificate = Certificate::create([
            'user_id' => $this->user->id,
            'certificate_type' => $row->children[1]->innertext(),
            'event' => $row->children[2]->innertext(),
            'date' => $row->children[3]->innertext(),
            'hours' => $row->children[4]->innertext(),
            'link' => StringHelper::getText('/<a href\="(.*?)">/i', $row->children[5]->innertext()),
            'certificate_name' => $row->children[0]->innertext(),
        ]);
        $this->user->certificates()->save($certificate);
    }

    private function getCertificatesFromDB()
    {
        return DB::select("select * from certificates where user_id={$this->user->id}");
    }
}
