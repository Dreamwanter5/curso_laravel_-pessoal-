<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Http\Requests\LivroRequest;

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

    public function store(LivroRequest $request){
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'ano' => 'required|integer',
        ]);

        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->ano = $request->ano;
        $livro->user_id = auth()->user()->id; // Atribui o ID do usuário autenticado ao campo user_id do livro, é a concretização da alteração.
        $livro->save();
        return redirect('/livros');
    }

    public function edit(Livro $livro){
        return view('livros.edit', [
            'livro' => $livro
        ]);
    }

    // Digitar Request $request é uma forma de dizer que Request é uma variável do láravel e $request é o nome da variável, e o Livro $livro é a variável do livro que eu quero atualizar.
    public function update(LivroRequest $request, Livro $livro){
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'ano' => 'required|integer',
        ]);

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
