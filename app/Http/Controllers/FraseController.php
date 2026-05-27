<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frase;
use Carbon\Carbon;

class FraseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $frases = Frase::query()
            ->when($search, function ($query, $search) {
                $query->where('dia_semana', 'like', "%{$search}%")
                    ->orWhere('texto', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('frases.frase', [
            'frases' => $frases,
            'search' => $search,
        ]);
    }

    public function fraseDoDia()
    {
        $num = now()->dayOfWeekIso;
    // O carbon como biblioteca existente dentro do sistema para manipulação de dados foi utilizado para pegar o dia da semana atual em extenso, por isso o uso de isoFormat('dddd'). Ucfirst serve para deixar a primeira letra maiúscula.
        $diaSemana = ucfirst(Carbon::now()->isoFormat('dddd'));

        $frase = null;

        if ($diaSemana) {
            $frase = Frase::where('dia_semana', $diaSemana)->inRandomOrder()->first();
        }
    
        if (! $frase) {
            $frase = Frase::inRandomOrder()->first();
        }

        return view('frases.fraseDoDia', [
            'frase' => $frase,
            'dia' => $diaSemana,
        ]);
    }
//
    public function show(Frase $frase)
    {
        return view('frases.show', [
            'frase' => $frase
        ]);
    }

    public function create()
    {
        return view('frases.create');
    }

    public function store(Request $request)
    {
        $frase = new Frase;
        $frase->dia_semana = $request->dia_semana;
        $frase->texto = $request->texto;
        $frase->pontuacao = $request->pontuacao;
        $frase->user_id = $request->user()->id;
        $frase->save();
        return redirect('/frases');
    }

    public function edit(Frase $frase){
        return view('frases.edit', [
            'frase' => $frase
        ]);
    }

    // Digitar Request $request é uma forma de dizer que Request é uma variável do láravel e $request é o nome da variável, e o Livro $livro é a variável do livro que eu quero atualizar.
    public function update(Request $request, Frase $frase){
        $frase->dia_semana = $request->dia_semana;
        $frase->texto = $request->texto;
        $frase->pontuacao = $request->pontuacao;
        $frase->edited_by_user_id = $request->user()->id;
        $frase->save();
        return redirect("/frases/{$frase->id}");
    }

    public function destroy(Frase $frase){
        $frase->delete();
        return redirect('/frases');
    }
}
