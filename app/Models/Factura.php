<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Factura extends Model
{
    function empresa(){
        $this->belongsTo('App\Models\Empresa');
    }

    function recibo(){
        $this->hasOne('App\Models\Recibo');
    }

    function guardarArchivo($file, $cliente)
    {
        $rutaFolderCliente = storage_path($cliente);
        if (!file_exists($rutaFolderCliente)) {
            $ruta = Storage::disk('public')->put($cliente,  $file);
        }
        return $ruta;
    }
}
