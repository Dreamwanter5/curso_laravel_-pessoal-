<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EstatisticaController;
//Adicionei o EstatisticaController para a criação da rota

Route::get('/', function () {
    return view('welcome');
});

# CREATE
Route::post('/livros', [LivroController::class,'store']);
Route::get('/livros/create', [LivroController::class,'create']);

# READ
# get - é um método para LER
Route::get('/livros', [LivroController::class,'index']);
Route::get('/livros/{livro}', [LivroController::class,'show']);
Route::get('/livros/stats', [EstatisticaController::class, 'stats']);

# UPDATE
// No laravel há diversos tipos de update, por isso é necessário especificar o tipo de update, e nesse caso é o patch. Que serve para atualizar apenas o campo que desejo alterar.
Route::get('/livros/{livro}/edit', [LivroController::class,'edit']);
Route::patch('/livros/{livro}', [LivroController::class,'update']);

# DELETE
Route::delete('/livros/{livro}', [LivroController::class,'destroy']);