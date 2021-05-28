<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\Medecin\MedecinController::class, 'index'])->name('dashboard.medecin');

Route::get('/ajouter_malade', [App\Http\Controllers\Malade\MaladeController::class, 'create'])->name('diplay.create.malade');
Route::post('/ajouter_malade', [App\Http\Controllers\Malade\MaladeController::class, 'store'])->name('create.malade');
Route::get('/historique_malade', [App\Http\Controllers\Malade\MaladeController::class, 'showHisotrique'])->name('historique.malade');
Route::get('/getMalade', [App\Http\Controllers\Malade\MaladeController::class, 'getMalade']);

