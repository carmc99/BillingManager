<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Recibo extends Model
{
    function factura(){
        return $this->belongsTo('App\Models\Factura','factura_id','num_factura');
    }

    function empresa()
    {
        return $this->belongsTo('App\Models\Empresa','empresa_nit','nit');
    }

    function empresaGeneradora(){
        return $this->belongsTo('App\Models\EmpresaGeneradora');
    }

    function guardarRecibo($file, $cliente)
    {
        $rutaFolderCliente = storage_path($cliente);
        if (!file_exists($rutaFolderCliente)) {
            $ruta = Storage::disk('public')->put($cliente,  $file);
        }
        return $ruta;
    }
}
