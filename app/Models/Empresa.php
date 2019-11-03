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
        $this->hasMany('App\Models\User');
    }

    function facturas(){
        $this->hasMany('App\Models\Factura');
    }

    function recibos(){
        $this->hasMany('App\Models\Recibo');
    }
}
