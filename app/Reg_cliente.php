<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg_cliente extends Model
{
    protected $table='cliente'; //nome tab
    protected  $primaryKey ='email';
    public $incrementing =false; //non è autoincrement
    protected $keyType= 'string'; //specificare tipo chiave
    public $timestamps= false; // se non esisteno le colonne crearte da miograte
}
