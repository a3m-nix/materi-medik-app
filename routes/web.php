<?php

use App\Http\Controllers\PasienController;
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

 Route::resource('pasien', PasienController::class);

Route::get('profil', [App\Http\Controllers\ProfilController::class, 'index']);

Route::get('profil/create', [App\Http\Controllers\ProfilController::class, 'create']);

Route::get('profil/{nama}/{id}/edit', [App\Http\Controllers\ProfilController::class, 'edit']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');