<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Livro;

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
        $arquivo = fopen($caminho, 'r'); //"r" - read ou leitura, assim ele lê o csv.
        // Verificação
        if ($arquivo === false) {
            $this->error('Não foi possível abrir o arquivo CSV.');

            return Command::FAILURE;
        }
        
        $importados = 0;

        fgetcsv($arquivo); // Ignora a primeira linha do CSV 

        //o fgetcsv lê as linhas do arquivo csv, separando-os pela vírgula.

        while (($linha = fgetcsv($arquivo)) !== false) {

            $livro = new Livro();
            $livro->titulo = ($linha[0]);
            $livro->autor = ($linha[1]);
            $livro->ano = (int) ($linha[2]);
            $livro->save();

            $importados++;
        }

        fclose($arquivo);

        $this->info("{$importados} livros importados com sucesso!");
        
        return Command::SUCCESS;
    }
}
