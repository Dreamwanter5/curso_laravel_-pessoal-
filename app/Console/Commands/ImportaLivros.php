<?php

namespace App\Console\Commands;

use App\Models\Livro;
use Illuminate\Console\Command;
use League\Csv\Reader;


class ImportaLivros extends Command
{
    protected $signature = 'livros:importar';
    protected $description = 'Importa livros a partir de um arquivo CSV';
  
    // Pus o arquivo livros.csv no diretório principal e por recomendação fiz uso do código de basepath para fosse possível utilizar comandos do php artisan sem precisar ficar especificando o caminho do arquivo.
    public function handle()
    {
        //Para zerar a lista de livros.
        Livro::truncate();

        $caminho = base_path('livros.csv');
        if (! is_readable($caminho)) {
            $this->error('Não foi possível abrir o arquivo CSV.');

            return Command::FAILURE;
        }

        $csv = Reader::createFromPath($caminho, 'r'); // O Reader por si só já é capaz de ler o arquivo CSV, e o 'r' indica que é para leitura.
        $csv->setHeaderOffset(0);
        
        $importados = 0;
        // o getRecords() é um método do League\Csv\Reader que retorna um iterador para percorrer as linhas do CSV, e cada linha é representada como um array associativo onde as chaves são os nomes das colunas (definidos pelo setHeaderOffset(0)).
        foreach ($csv->getRecords() as $linha) {
            $livro = new Livro();
            $livro->titulo = $linha['titulo'];
            $livro->autor = $linha['autor'];
            $livro->ano = (int) $linha['ano'];
            $livro->save();

            $importados++;
        }

        $this->info("{$importados} livros importados com sucesso!");
        
        return Command::SUCCESS;
    }
}
