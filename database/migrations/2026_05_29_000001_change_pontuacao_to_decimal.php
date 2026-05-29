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
        Schema::table('frases', function (Blueprint $table) {
            // Change to decimal with 2 decimal places (requires doctrine/dbal for many DB drivers)
            $table->decimal('pontuacao', 4, 2)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frases', function (Blueprint $table) {
            $table->unsignedTinyInteger('pontuacao')->default(0)->change();
        });
    }
};
