<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inserzione extends Model
{
    protected $table='inserzione'; //nome tab
    protected  $primaryKey ='id_inserzione';
    public $incrementing =true; // è autoincrement
    public $timestamps= false; // se non esisteno le colonne crearte da miograte
}
