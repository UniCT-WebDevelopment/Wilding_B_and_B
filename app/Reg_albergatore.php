<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_albergatore extends Model
{
    protected $table='albergatore'; //nome tab
    protected  $primaryKey ='email';
    public $incrementing =false; //non è autoincrement
    protected $keyType= 'string'; //specificare tipo chiave
    public $timestamps= false; // se non esisteno le colonne crearte da miograte
}
