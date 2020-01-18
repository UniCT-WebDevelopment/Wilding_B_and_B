<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocazioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locazione', function (Blueprint $table) {
            $table->bigIncrements('id_locazione');
            $table->integer('num_affittuari');
            $table->dateTime('data_inizio');
            $table->dateTime('data_fine');
            $table->string('tipologia_affitto');
            //relazione
            $table->bigInteger('id_casa');
            $table->string('id_cliente',40);
            $table->bigInteger('id_pagamento');
            $table->foreign('id_casa')->references('id_casa')->on('casa');
            $table->foreign('id_cliente')->references('email')->on('cliente');
            $table->foreign('id_pagamento')->references('id_pagamento')->on('pagamenti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locazione');
    }
}
