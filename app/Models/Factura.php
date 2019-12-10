<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Factura extends Model
{
    function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_nit', 'nit');
    }

    function recibos()
    {
        return $this->hasMany('App\Models\Recibo', 'factura_id', 'num_factura');
    }

    function empresaGeneradora()
    {
        return $this->belongsTo('App\Models\EmpresaGeneradora', 'empresa_generadora_nit', 'nit');
    }

    function guardarFactura($file, $cliente)
    {
        $rutaFolderCliente = storage_path($cliente);
        if (!file_exists($rutaFolderCliente)) {
            $ruta = Storage::disk('public')->put($cliente, $file);
        }
        return $ruta;
    }

    function eliminarFactura($file)
    {
        $file = storage_path() . '/app/public/' . $file;
        if (is_file($file)) {
            unlink($file);
        }
    }

    public static function getEstado($facturaId)
    {
        $estadoFactura = DB::table('facturas')->join('estados_factura', 'facturas.estado_id', '=', 'estados_factura.codigo')
            ->where('num_factura', '=', $facturaId)
            ->select('nombre')->pluck('nombre');
        #var_dump($estadoFactura);
        #dd();
        return $estadoFactura;
    }

    public function actualizarPago($facturaId, $nuevoEstado, $nuevoSaldo)
    {
        DB::table('facturas')
            ->where('num_factura', $facturaId)
            ->update([
                'estado_id' => $nuevoEstado,
                'valor_adeudado' => $nuevoSaldo
            ]);
    }

    public function definirEstado($facturaId, $nuevoSaldo)
    {
        var_dump($nuevoSaldo);

        if ($nuevoSaldo == 0) {
            var_dump('pago');
            $this->actualizarPago($facturaId, 1, $nuevoSaldo); //Pago
        } elseif ($nuevoSaldo < 0) {
            var_dump('favor');
            $this->actualizarPago($facturaId, 2, $nuevoSaldo); //Saldo a favor
        } else {
            var_dump('Pend');
            $this->actualizarPago($facturaId, 3, $nuevoSaldo); //Saldo pendiente
        }
    }
}
