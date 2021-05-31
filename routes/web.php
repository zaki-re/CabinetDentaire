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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Medecin\MedecinController::class, 'index'])->name('dashboard.medecin');

    Route::get('/ajouter_malade', [App\Http\Controllers\Malade\MaladeController::class, 'create'])->name('diplay.create.malade');
    Route::post('/ajouter_malade', [App\Http\Controllers\Malade\MaladeController::class, 'store'])->name('create.malade');
    Route::get('/historique_malade', [App\Http\Controllers\Malade\MaladeController::class, 'showHisotrique'])->name('historique.malade');
    Route::get('/getMalade', [App\Http\Controllers\Malade\MaladeController::class, 'getMalade']);

    Route::get('/consulter_profile/{id_malade}', [App\Http\Controllers\Malade\MaladeController::class, 'showProfile'])->name('profile.name');
    Route::get('/antecedants', [App\Http\Controllers\Medecin\AntecedantsController::class, 'antecedantsShow'])->name('show.antecedants');
    Route::get('/get_antecedants', [App\Http\Controllers\Medecin\AntecedantsController::class, 'getAntecedants'])->name('get.antecedants');
    Route::post('/ajouter_antecedant', [App\Http\Controllers\Medecin\AntecedantsController::class, 'createAntecedants'])->name('add.antecedants');
    Route::get('/delete_antecedants/{id_antecedants}', [App\Http\Controllers\Medecin\AntecedantsController::class, 'removeAntecedants'])->name('delete.antecedants');
    Route::get('/delete_malade/{id_antecedants}', [App\Http\Controllers\Malade\MaladeController::class, 'destroy'])->name('delete.malade');
    Route::get('/nombre_de_malade', [App\Http\Controllers\Malade\MaladeController::class, 'nbrDeMalade'])->name('nombre.malade');
    Route::get('/malade_antecedants/{id_malade}', [App\Http\Controllers\Medecin\AntecedantsController::class, 'maladeAntecedants'])->name('malade.antecedants');
    Route::get('/type_consultations', [App\Http\Controllers\Medecin\TypeConsultationController::class, 'index'])->name('show.consultation');
    Route::get('/get_type_consultations', [App\Http\Controllers\Medecin\TypeConsultationController::class, 'show'])->name('display.type.consultation');
    Route::get('/delete_type_consultation/{id_consultation}', [App\Http\Controllers\Medecin\TypeConsultationController::class, 'destroy'])->name('delete.type.consultation');
    Route::post('/ajouter_type_consultation', [App\Http\Controllers\Medecin\TypeConsultationController::class, 'store'])->name('ajotuer.type.consultation');
    Route::post('/update_patient/{id}', [App\Http\Controllers\Malade\MaladeController::class, 'update'])->name('ajotuer.consultation');
    Route::get('/getDents', [App\Http\Controllers\Medecin\DentController::class, 'show'])->name('get.dents');
    Route::get('/getDents', [App\Http\Controllers\Medecin\DentController::class, 'show'])->name('get.dents');
    Route::post('/ajotuer_consultation', [App\Http\Controllers\Medecin\ConsultationController::class, 'store'])->name('ajotuer.consultation');
    Route::get('/get_consultation/{id_malade}', [App\Http\Controllers\Medecin\ConsultationController::class, 'show'])->name('ajotuer.consultation');
    Route::get('/get_dents_consultation/{id_malade}', [App\Http\Controllers\Medecin\ConsultationController::class, 'getDentsConsultation'])->name('get.dents.consultation');



});

