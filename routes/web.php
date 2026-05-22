<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EstatisticaController;
use App\Http\Controllers\FraseController;
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

//Frases CRUD
# CREATE
Route::get('/frases/create', [FraseController::class,'create']);
Route::post('/frases', [FraseController::class,'store']);

# READ
Route::get('/frases', [FraseController::class,'index']);
Route::get('/frases/{frase}', [FraseController::class,'show']);

# UPDATE
Route::get('/frases/{frase}/edit', [FraseController::class,'edit']);
Route::patch('/frases/{frase}', [FraseController::class,'update']);

# DELETE
Route::delete('/frases/{frase}', [FraseController::class,'destroy']);

// Frase do dia (aleatória, por dia da semana)
Route::get('/frasedodia', [FraseController::class, 'fraseDoDia']);

