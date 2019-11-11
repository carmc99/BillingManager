<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Factura extends Model
{
    function empresa(){
        return $this->belongsTo('App\Models\Empresa','empresa_nit', 'nit');
    }

    function recibo(){
        return $this->hasOne('App\Models\Recibo');
    }

    function empresaGeneradora(){
        return $this->belongsTo('App\Models\EmpresaGeneradora','empresa_generadora_nit', 'nit');
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
