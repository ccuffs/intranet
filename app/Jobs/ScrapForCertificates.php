<?php

namespace App\Jobs;

use App\Models\Certificate;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use KubAT\PhpSimple\HtmlDomParser;

class ScrapForCertificates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url = "https://sgce.uffs.edu.br/certificados/listaCertificadosPublicosPorNome";
    private $id;

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
        $client = new Client();

        $user = User::select()->where("id", $this->id)->first();

        $body = [
            "txtNome" => $user->name,
        ];

        $options = ['headers' => ['Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'Content-Type' => 'application/x-www-form-urlencoded'], 'form_params' => $body];

        $response = $client->post("https://sgce.uffs.edu.br/certificados/listaCertificadosPublicosPorNome", $options);

        $dom = HtmlDomParser::str_get_html($response->getBody());

        $table = $dom->getElementById("data_table");

        $array = [];

        foreach ($table->children as $row) {
            if ($row->getAttribute("id") != null) {
                $certificate = Certificate::create([
                    'user_id' => $user->id,
                    'certificate_type' => $row->children[1]->innertext(),
                    'event' => $row->children[2]->innertext(),
                    'date' => $row->children[3]->innertext(),
                    'hours' => $row->children[4]->innertext(),
                    'link' => $row->children[5]->innertext(),
                ]);
                $user->certificates()->save($certificate);
            }
        }
    }
}
