<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

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
        $user = $request->user();

        if($user->sites()->count() == 0) {
            $site = Site::create([
                'user_id' => $user->id,
                'enabled' => false,
                'allowed' => true,
                'serve_url' => '',
                'source_url' => '',
                'source_type' => ''
            ]);

            $user->sites()->save($site);
        }

        return view('sites.show', [
            'request' => $request,
            'available' => !empty($user->github),
            'sites' => $user->sites(),
            'user' => $request->user(),
        ]);
    }
}
