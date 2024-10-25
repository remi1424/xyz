<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->id()->first()->change();
        });

        // Si vous avez des enregistrements avec ID NULL, cette ligne les corrigera
        DB::statement('UPDATE categories SET id = (SELECT MAX(id) FROM (SELECT * FROM categories) AS t) + 1 WHERE id IS NULL');
    }

    public function down()
    {
        // Rien à faire ici
    }
};