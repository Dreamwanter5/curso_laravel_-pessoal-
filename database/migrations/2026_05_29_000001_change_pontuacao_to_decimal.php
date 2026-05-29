<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('frases', function (Blueprint $table) {
            $table->decimal('pontuacao', 4, 2)->default(0)->change();
        });
    }

    
    public function down(): void
    {
        Schema::table('frases', function (Blueprint $table) {
            $table->unsignedTinyInteger('pontuacao')->default(0)->change();
        });
    }
};
