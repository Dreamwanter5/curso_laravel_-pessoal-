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
        $num = now()->dayOfWeekIso; // 1 (Mon) .. 7 (Sun)

        $dia = [
            1 => 'Segunda-feira',
            2 => 'Terça-feira',
            3 => 'Quarta-feira',
            4 => 'Quinta-feira',
            5 => 'Sexta-feira',
            6 => 'Sábado',
            7 => 'Domingo',
        ];

        $dia = $dia[$num] ?? null;

        $frase = null;
        if ($dia) {
            $frase = Frase::where('dia_semana', $dia)->inRandomOrder()->first();
        }

        if (! $frase) {
            $frase = Frase::inRandomOrder()->first();
        }

        return view('frases.fraseDoDia', [
            'frase' => $frase,
            'dia' => $dia,
        ]);
    }

    public function show(Frase $frase)
    {
        return view('frases.show', [
            'frase' => $frase
        ]);
    }

    public function create(){
        return view('frases.create');
    }

    public function store(Request $request){
    $frase = new Frase;
    $frase->dia_semana = $request->dia_semana;
    $frase->texto = $request->texto;
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
        $frase->save();
        return redirect("/frases/{$frase->id}");
    }

    public function destroy(Frase $frase){
        $frase->delete();
        return redirect('/frases');
    }
}
