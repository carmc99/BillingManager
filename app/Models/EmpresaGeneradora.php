<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaGeneradora extends Model
{
    protected $table = 'empresas_generadoras';

    function facturas()
    {
        return $this->hasMany('App\Models\Factura');
    }

    function recibos()
    {
        return $this->hasMany('App\Models\Recibo');
    }
}
