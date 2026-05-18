<?php

namespace App\Console\Commands;

use App\Models\Frase;
use Illuminate\Console\Command;
use League\Csv\Reader;

class ImportaFrases extends Command
{
    protected $signature = 'frases:importar';
    protected $description = 'Importa frases a partir de um arquivo CSV';

    public function handle()
    {
        Frase::truncate();

        $caminho = base_path('frases.csv');
        if (! is_readable($caminho)) {
            $this->error('Não foi possível abrir o arquivo CSV.');

            return Command::FAILURE;
        }

        $csv = Reader::createFromPath($caminho, 'r');
        $csv->setDelimiter(';');

        $importados = 0;

        // Lê cada uma das linhas do arquivo CSV e verifica se as colunas necessárias estão presentes. Se estiverem, ele as põe no banco de dados
        foreach ($csv->getRecords() as $linha) {
            if (! isset($linha[0], $linha[1])) {
                continue;
            }

            $frase = new Frase();
            $frase->dia_semana = trim($linha[0]);
            $frase->texto = trim($linha[1]);
            $frase->save();

            $importados++;
        }

        $this->info("{$importados} frases importadas com sucesso!");

        return Command::SUCCESS;
    }
}
