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
                ->pause(2000)
                ->typeSlowly('dia_semana', 'Segunda-feira')
                ->pause(2000)
                ->typeSlowly('texto', 'FRASE TESTE 1')
                ->pause(2000)
                ->press('Enviar')
                ->assertPathIs('/frases')
                ->pause(2000)
                ->assertSee('Segunda-feira')
                ->assertSee('FRASE TESTE 1');

            // Read
            $frase = Frase::latest()->first();

            $browser->visit("/frases/{$frase->id}")
                ->pause(2000)
                ->assertSee('Segunda-feira')
                ->assertSee('FRASE TESTE 1');

            // Update
            $browser->visit("/frases/{$frase->id}/edit")
                ->pause(2000)
                ->typeSlowly('dia_semana', 'Terça-feira')
                ->typeSlowly('texto', 'FRASE TESTE 2')
                ->pause(2000)
                ->press('Enviar')
                ->assertPathIs("/frases/{$frase->id}")
                ->pause(2000)
                ->assertSee('Terça-feira')
                ->assertSee('FRASE TESTE 2');

            // Search
            $browser->visit('/frases?search=Terça-feira')
                ->pause(2000)
                ->assertSee('Terça-feira')
                ->assertSee('FRASE TESTE 2');

            // Delete
            $browser->visit("/frases/{$frase->id}")
                ->pause(2000)
                ->press('Apagar')
                ->pause(2000)
                ->acceptDialog()
                ->pause(2000)
                ->assertPathIs('/frases')
                ->assertDontSee('Terça-feira')
                ->assertDontSee('FRASE TESTE 2');
        });
    }

}
