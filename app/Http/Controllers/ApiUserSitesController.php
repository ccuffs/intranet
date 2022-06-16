<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApiUserSitesController extends Controller
{
    /**
     * Show the user sites screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function list(Request $request)
    {
        $sites = DB::table('sites')
                    ->join('users', 'sites.user_id', '=', 'users.id')
                    ->select('sites.id', 'users.uid', 'sites.serve_url', 'sites.source_url', 'sites.source_type')
                    ->get();

        return Response::json($sites, 200, array(), JSON_PRETTY_PRINT);
    }

    /**
     * Show the user sites that need to be updated now.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function listUpdateNow(Request $request)
    {
        $sites = DB::table('sites')
            ->join('users', 'sites.user_id', '=', 'users.id')
            ->select('sites.id', 'users.uid', 'sites.serve_url', 'sites.source_url', 'sites.source_type')
            ->where('update_now', true)
            ->get();

        return Response::json($sites, 200, array(), JSON_PRETTY_PRINT);
    }

    /**
     * Set the user's site as updated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function updated(Request $request)
    {
        try {
            DB::table('sites')
                ->where('id',$request->id)
                ->update([
                    "update_now"=> false,
                    "updated_at"=> date("Y-m-d h:i:s")
                    ]);

            return Response::json([
                'success' => true,
                'messages' => "Site atualizado com sucesso.",
                'errors' => null
            ]);
        }
        catch (\Exception $e){
            return Response::json([
                'success' => false,
                'messages' => null,
                'errors' => "Erro: {$e->getMessage()}."
            ]);
        }
    }
}
