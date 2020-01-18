<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class casa extends Model
{
    protected $table='casa'; //nome tab
    protected $primaryKey = 'id_casa';
    public $incrementing =true; // è autoincrement
    public $timestamps= false; // se non esisteno le colonne crearte da miograte
}
