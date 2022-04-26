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

    private $url = "https://sgce.uffs.edu.br/certificados/listaCertificadosPublicosPorNome";
    private $id;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->client = new Client();

        $this->user = User::select()->where("id", $this->id)->first();

        $body = [
            "txtNome" => $this->user->name,
        ];

        $options = ['headers' => ['Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'Content-Type' => 'application/x-www-form-urlencoded'], 'form_params' => $body];

        $response = $this->client->post("https://sgce.uffs.edu.br/certificados/listaCertificadosPublicosPorNome", $options);

        $dom = HtmlDomParser::str_get_html($response->getBody());

        if (StringHelper::checkIfContains($dom->getElementById("data_table")->innertext(), "Não foram encontrados certificados válidos para emissão")) {
            return;
        } else if (!StringHelper::checkIfContains($dom->find("div[class=center_table]", 0)->innertext(), "Último")) {
            $this->readPage($dom);
        } else {
            $this->readPage($dom);

            $lastUrl = $dom->find("div[class=paginacao]", 0)->children[count($dom->find("div[class=paginacao]", 0)->children) - 1]->getAttribute('href');
            $lastPage = StringHelper::getText('/listaCertificadosPublicosPorNome\/(\d+)/i', $lastUrl);
            $lastPage = intval($lastPage);

            $pages = $lastPage / 15;

            for ($i = 1; $i < $pages; $i++) {
                $urlComplement = $i * 15;
                $body = [
                    "txtNome" => $this->user->name,
                ];

                $options = ['headers' => ['Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'Content-Type' => 'application/x-www-form-urlencoded'], 'form_params' => $body];

                $response = $this->client->post("https://sgce.uffs.edu.br/certificados/listaCertificadosPublicosPorNome/{$urlComplement}", $options);
                $dom = HtmlDomParser::str_get_html($response->getBody());

                $this->readPage($dom);
            }
        }
    }

    private function readPage($dom)
    {
        $table = $dom->getElementById("data_table");

        $array = [];

        $certificatesDB = DB::select("select * from certificates where (user_id={$this->user->id})");

        foreach ($table->children as $row) {
            $shouldSave = true;
            if ($row->getAttribute("id") != null) {
                foreach ($certificatesDB as $certificateDB) {
                    if ($row->children[2]->innertext() == $certificateDB->event) {
                        $shouldSave = false;
                    }
                }
                if ($shouldSave) {
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
            }
        }

    }
}
