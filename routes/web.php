<?php

use App\Http\Controllers\AuraController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\UserSitesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

// Fix wrong style/mix urls when being served from reverse proxy
URL::forceRootUrl(config('app.url'));

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        // Sites
        Route::get('/user/sites', [UserSitesController::class, 'show'])
            ->name('sites.show');

        // Aura
        Route::get('/aura', [AuraController::class, 'show'])
            ->name('aura.show');

        // Certificates
        Route::get('/certificates', [CertificatesController::class, 'show'])
            ->name('certificates.show');

        // RU
        Route::get('/ru', [\App\Http\Controllers\RuController::class, 'show'])
            ->name('ru.show');
    });
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(config('fortify.home'));
    } else {
        return view('auth.login');
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
