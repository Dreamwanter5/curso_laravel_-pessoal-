<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            // Adiciona a coluna 'preco' do tipo float, com 10 dígitos no total e 2 casas decimais, e permite valores nulos 
            $table->float('preco', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('preco');
        });
    }
};
