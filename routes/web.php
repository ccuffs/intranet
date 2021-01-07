<?php

use App\Http\Controllers\UserSitesController;
use App\Http\Controllers\AuraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        // Sites
        Route::get('/user/sites', [UserSitesController::class, 'show'])
                    ->name('sites.show');

        // Aura
        Route::get('/aura', [AuraController::class, 'show'])
                    ->name('aura.show');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
