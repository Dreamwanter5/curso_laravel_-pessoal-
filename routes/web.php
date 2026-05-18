<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EstatisticaController;
//Adicionei o EstatisticaController para a criação da rota

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livros', [LivroController::class,'index']);
Route::get('/livros/stats', [EstatisticaController::class, 'stats']);
//A rota para a as estatísticas.