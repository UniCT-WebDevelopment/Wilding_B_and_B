<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casa', function (Blueprint $table) {
            $table->bigIncrements('id_casa');
            $table->string('nome_casa');
            $table->string('indirizzo_civico')->nullable($value = false);
            $table->string('citta')->nullable($value = false);
            $table->integer('cap');
            $table->integer('num_stanze')->nullable($value = false);
            $table->string('foto');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casa', function (Blueprint $table) {
            //
        });
    }
}
