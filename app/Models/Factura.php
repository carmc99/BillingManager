<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    function empresa(){
        $this->belongsTo('App\Models\Empresa');
    }

    function recibo(){
        $this->hasOne('App\Models\Recibo');
    }
}
