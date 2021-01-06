<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserSitesController extends Controller
{
    /**
     * Show the user sites screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('sites.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
