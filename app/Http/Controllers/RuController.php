<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RuController extends Controller
{
    private $url;
    /**
     * Show the ru menu screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $this->client = new Client();
        $this->url = config("scraping.urlRuApi");

        $res = $this->client->request('GET', "{$this->url}/campus/chapeco");

        $data = ($res->getStatusCode() != 200) ? null : json_decode($res->getBody());

        return view('ru.show', [
            "data" => $data
        ]);
    }

}
