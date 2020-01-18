<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('email',40)->primary();
            $table->string('nome')->nullable($value = false);
            $table->string('cognome')->nullable($value = false);
            $table->string('password')->nullable($value = false);
            $table->string('cod_fiscale')->unique();
            $table->string('contatto');
            $table->integer('ranking');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('cliente');
    }
}
