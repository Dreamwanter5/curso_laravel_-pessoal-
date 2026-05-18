<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $livros = Livro::where('titulo','like','%'.$request->search.'%')->get();
        } else {
            $livros = Livro::all();
        }

        return view('livros.index', [
            'livros' => $livros
        ]);
    }

    public function show(Livro $livro)
    {
        return view('livros.show', [
            'livro' => $livro
        ]);
    }

    public function create(){
        return view('livros.create');
    }

    public function store(Request $request){
    $livro = new Livro;
    $livro->titulo = $request->titulo;
    $livro->autor = $request->autor;
    $livro->ano = $request->ano;
    $livro->save();
    return redirect('/livros');
    }

    public function edit(Livro $livro){
        return view('livros.edit', [
            'livro' => $livro
        ]);
    }

    // Digitar Request $request é uma forma de dizer que Request é uma variável do láravel e $request é o nome da variável, e o Livro $livro é a variável do livro que eu quero atualizar.
    public function update(Request $request, Livro $livro){
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->ano = $request->ano;
        $livro->save();
        return redirect("/livros/{$livro->id}");
    }

    public function destroy(Livro $livro){
        $livro->delete();
        return redirect('/livros');
    }
}
