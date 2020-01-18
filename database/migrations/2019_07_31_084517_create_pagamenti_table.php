<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamenti', function (Blueprint $table) {
            $table->bigIncrements('id_pagamento');
            $table->string('mod_pagamento')->nullable($value = false);
            $table->string('ricevuta')->nullable($value = false);
            //relazione
            $table->string('id_cliente',40);
            $table->string('id_albergatore',40);
            $table->foreign('id_cliente')->references('email')->on('cliente');
            $table->foreign('id_albergatore')->references('email')->on('albergatore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('pagamenti');
    }
}
