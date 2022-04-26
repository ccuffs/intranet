<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CertificatesController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $data = DB::select("select * from certificates where (user_id={$user->id})");

        return view('certificates.show', [
            'request' => $request,
            'user' => $request->user(),
            'data' => $data,
        ]);
    }
}
