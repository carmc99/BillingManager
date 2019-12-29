<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class Evento extends Model
{

    public function __construct()
    {

    }

    public function registrarEvento($tipoEvento, $descripcion, $clave, $autor){
        $evento = new Evento();
        $evento->tipo_evento = $tipoEvento;
        $evento->descripcion = $descripcion;
        $evento->autor = $autor;
        $evento->clave = $clave;
        $evento->created_at = Carbon::now();
        $evento->updated_at = Carbon::now();
        $evento->saveOrFail();
    }

    public function obtenerEventos(){
            return DB::select('select * from eventos order by created_at desc limit 5');
    }

}
