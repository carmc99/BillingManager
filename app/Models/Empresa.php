<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    function users()
    {
        $this->hasMany('App\Models\User');
    }

    function facturas(){
        $this->hasMany('App\Models\Factura');
    }

    function recibos(){
        $this->hasMany('App\Models\Recibo');
    }
}
