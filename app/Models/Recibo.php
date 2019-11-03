<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    function factura(){
        $this->belongsTo('App\Models\Factura');
    }

    function empresa()
    {
        $this->belongsTo('App\Models\Empresa');
    }
}
