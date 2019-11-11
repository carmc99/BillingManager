<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = ['nombre', 'nit', 'correo'];

    function users()
    {
        return $this->hasMany('App\Models\User');
    }

    function facturas(){
        return $this->hasMany('App\Models\Factura');
    }

    function recibos(){
        return $this->hasMany('App\Models\Recibo');
    }
}
