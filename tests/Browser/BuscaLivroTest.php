<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BuscaLivroTest extends DuskTestCase
{
    // public function testPaginaDeLivrosExisteListagem()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/livros')
    //                 ->pause(5000) //5 segundos
    //                 ->assertSee('Listagem de Livros');
    //     });
    // }
    //2 - Criar teste Dusk para buscar a string “processo” e deverá ter um assert para ver Franz Kafka e um assert not para José de Alencar;
    public function testeKafkaAlencar(){
        $this->browse(function(Browser $browser){
          $browser->visit('/livros')
            ->pause(2000)
            ->typeSlowly('search', 'processo', 300)
            ->pause(2000)
            ->press('Pesquisar')
            ->pause(2000)
            ->assertSee('Franz Kafka')
            ->assertDontSee('José de Alencar');

        });
    }
    
    
}
