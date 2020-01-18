<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locazione extends Model
{
    protected $table='locazione'; //nome tab
    protected  $primaryKey ='id_locazione';
    public $incrementing =true; // è autoincrement
    public $timestamps= false; // se non esisteno le colonne crearte da miograte
}
