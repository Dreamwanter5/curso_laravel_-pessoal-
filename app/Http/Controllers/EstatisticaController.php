<?php
//Copiei parte da estrutura do LivroController.php por precaução e pela similaridade entre os arquivos.
namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;


class EstatisticaController extends Controller
{
    public function stats()
    {
        $livrosPorAno = Livro::selectRaw('ano, COUNT(*) as total')
                    ->groupBy('ano')
                    //o groupBy('ano) mostra a coluna de ano e o total que já está com a função COUNT(*) está contando quantos livros tem para cada ano.
                    ->orderBy('ano', 'desc')
                    ->get();

        $livrosPorAutor = Livro::selectRaw('autor, COUNT(*) as total')
                    ->groupBy('autor')
                    ->orderBy('total', 'desc')
                    ->get();

        return view('estatisticas.stats', [
            'livrosPorAno' => $livrosPorAno,
            'livrosPorAutor' => $livrosPorAutor
        ]);
        //[...] salva em array as informações
    }
}
?>