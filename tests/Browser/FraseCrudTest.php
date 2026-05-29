<?php

namespace Tests\Browser;
use App\Models\User;
use App\Models\Frase;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FraseCrudTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function test_crud_frases(): void
    {
        // Essa função cria um usuário para ser usado apenas nos testes, foi uma solução que vi através de IAs.
        $user = User::factory()->create();
        Permission::findOrCreate('admin', 'senhaunica');
        Permission::findOrCreate('boss', 'senhaunica');
        Permission::findOrCreate('manager', 'senhaunica');
        Permission::findOrCreate('poweruser', 'senhaunica');
        Permission::findOrCreate('user', 'senhaunica');

        $this->browse(function (Browser $browser) use ($user) {
            // $browser->visit('/frases/create')
            //     ->assertUrlIs('http://auth.local:3141');

            // Certifica que o usuário está logado para acessar ferramentas do CRUD.
            $browser->loginAs($user)
                ->visit('/frases/create')
                ->pause(500) 
                ->screenshot('frase-create-page') 
                ->assertPathIs('/frases/create')
                ->assertSee('Adicionar Frase');

            // Create
            $browser->typeSlowly('dia_semana', 'Segunda-feira')
                ->typeSlowly('texto', 'FRASE TESTE 1')
                ->typeSlowly('pontuacao', '8.5')
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
                ->typeSlowly('pontuacao', '9.0')
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
