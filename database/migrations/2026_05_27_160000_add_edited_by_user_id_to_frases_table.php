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
            $table->unsignedBigInteger('edited_by_user_id')->nullable()->after('user_id');

            $table->foreign('edited_by_user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frases', function (Blueprint $table) {
            $table->dropForeign(['edited_by_user_id']);
            $table->dropColumn('edited_by_user_id');
        });
    }
};