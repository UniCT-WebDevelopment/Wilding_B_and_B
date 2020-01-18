<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifiche extends Model
{
    protected $table='notifiche'; //nome tab
    public $incrementing =true; // è autoincrement
    public $timestamps= false;
}
