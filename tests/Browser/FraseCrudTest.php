<?php

namespace Tests\Browser;
use App\Models\Frase;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FraseCrudTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function test_crud_frases(): void
    {
        $this->browse(function (Browser $browser) {
            // Create
            $browser->visit('/frases/create')
                ->typeSlowly('dia_semana', 'Segunda-feira')
                ->typeSlowly('texto', 'FRASE TESTE 1')
                ->press('Enviar')
                ->assertPathIs('/frases')
                ->assertSee('Segunda-feira')
                ->assertSee('FRASE TESTE 1');

            // Read
            $frase = Frase::latest()->first();

            $browser->visit("/frases/{$frase->id}")
                ->assertSee('Segunda-feira')
                ->assertSee('FRASE TESTE 1');

            // Update
            $browser->visit("/frases/{$frase->id}/edit")
                ->typeSlowly('dia_semana', 'Terça-feira')
                ->typeSlowly('texto', 'FRASE TESTE 2')
                ->press('Enviar')
                ->assertPathIs("/frases/{$frase->id}")
                ->assertSee('Terça-feira')
                ->assertSee('FRASE TESTE 2');

            // Search
            $browser->visit('/frases?search=Terça-feira')
                ->assertSee('Terça-feira')
                ->assertSee('FRASE TESTE 2');

            // Delete
            $browser->visit("/frases/{$frase->id}")
                ->press('Apagar')
                ->acceptDialog()
                ->assertPathIs('/frases')
                ->assertDontSee('Terça-feira')
                ->assertDontSee('FRASE TESTE 2');
        });
    }

}
