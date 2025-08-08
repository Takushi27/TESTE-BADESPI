<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VagaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetalhesController;
use App\Http\Controllers\CadastrarController;

use App\Http\Controllers\CandidaturasController;


Route::get('/', [VagaController::Class, 'index']);

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('autenticar');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/cadastrar', [CadastrarController::class, 'cadastro']);
Route::post('/cadastrar', [CadastrarController::class, 'cadastrar']);

Route::get('/detalhes', [DetalhesController::class, 'detalhes']);
Route::post('/detalhes', [DetalhesController::class, 'detalhes']);
Route::get('/vagas/{id}', [DetalhesController::class, 'show'])->name('vagas.show');
Route::patch('/vagas/{id}/pause', [VagaController::class, 'pause'])->name('vagas.pause')->middleware('auth');
Route::patch('/vagas/{id}/delete', [VagaController::class, 'delete'])->name('vagas.delete')->middleware('auth');
Route::match(['put', 'patch'], '/vagas/{id}/atualizar', [VagaController::class, 'atualizar'])->name('vagas.atualizar')->middleware('auth');
Route::get('/vagas/{id}/edit', [VagaController::class, 'edit'])->name('vagas.edit')->middleware('auth');


Route::get('/vagasIndividual', [VagaController::class, 'vagasIndividual']);
Route::get('/vagasIndividual', [VagaController::class, 'showRecrutadorVagas'])->middleware('auth')->name('vagasIndividual');
Route::get('/searchvagas', [VagaController::class, 'search'])->name('vagas.search');

Route::get('/candidatar/{id}', [CandidaturasController::class, 'candidatar'])->name('vagas.candidatar')->middleware('auth');
Route::post('/curriculos', [CandidaturasController::class, 'storeCandidaturas'])->name('curriculos.storeCandidaturas')->middleware('auth');

Route::get('/CandidaturasIndividual', [CandidaturasController::class, 'candidaturasIndividual']);
Route::get('/candidaturasIndividual', [CandidaturasController::class, 'showCandidaturasIndividual'])->middleware('auth')->name('candidaturas.minhas');
Route::delete('/candidaturas/{id}', [CandidaturasController::class, 'delete'])->middleware('auth')->name('candidaturas.delete');
Route::get('/vagas/{id}/candidatos', [CandidaturasController::class, 'listarCandidatos'])->name('vagas.candidatos');
Route::get('/curriculo/{id}/download', [CandidaturasController::class, 'download'])->name('curriculo.download');



Route::middleware('auth')->group(function(){
    Route::get('/create', [VagaController::class, 'create']);
    Route::post('/vagas', [VagaController::Class, 'store']);
});

