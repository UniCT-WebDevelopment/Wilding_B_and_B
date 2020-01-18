<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInserzioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inserzione', function (Blueprint $table) {
            $table->bigIncrements('id_inserzione');
            $table->dateTime('data_inserimento');
            $table->dateTime('data_expired');
            $table->string('tipologia_affitto')->nullable($value = false);
            $table->float('prezzo_ora', 5,2);
            $table->float('prezzo_giorno', 5,2);
            $table->string('regolamento');
            //relazioni
            $table->bigInteger('id_casa');
            $table->string('id_albergatore',40);
            $table->foreign('id_casa')->references('id_casa')->on('casa');
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
        //Schema::dropIfExists('inserzione');
    }
}
