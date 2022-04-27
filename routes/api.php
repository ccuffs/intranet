<?php

use App\Http\Controllers\ApiUserSitesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/sites/list.json', [ApiUserSitesController::class, 'list'])
        ->name('api.sites.list');

Route::get('/sites/listUpdateNow.json', [ApiUserSitesController::class, 'listUpdateNow'])
    ->name('api.sites.listUpdateNow');

Route::patch('/sites/updated', [ApiUserSitesController::class, 'updated'])
    ->name('api.sites.updated');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
