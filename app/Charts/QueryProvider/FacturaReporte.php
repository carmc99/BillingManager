<?php


namespace App\Charts\QueryProvider;


use Illuminate\Support\Facades\DB;

class FacturaReporte
{
    private $anno;
    private $generador;

    public function __construct($generador, $anno)
    {
        $this->anno = $anno;
        $this->generador = $generador;
    }

    public function getCuentaFacturas($mes, $estado = null)
    {
        if ($mes == null) {
            return DB::table('facturas')
                ->whereYear('created_at', $this->anno)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->count();
        }

        if ($estado == null) {
            return DB::table('facturas')
                ->whereYear('created_at', $this->anno)
                ->whereMonth('created_at', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->count();
        }else {
            return DB::table('facturas')
                ->whereYear('created_at', $this->anno)
                ->whereMonth('created_at', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->where('estado_id', '=', $estado)
                ->count();
        }

    }

    public function getValorTotalFacturas($mes, $facturaEstado = null)
    {
        if ($mes == null) {
            return DB::table('facturas')
                ->where('estado_id', '=', $facturaEstado)
                ->whereYear('fecha_facturacion', '=', $this->anno)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->sum('valor_total');
        }

        if ($facturaEstado == null) {
            return DB::table('facturas')
                ->whereYear('fecha_facturacion', '=', $this->anno)
                ->whereMonth('fecha_facturacion', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->sum('valor_total');
        } else {
            return DB::table('facturas')
                ->where('estado_id', '=', $facturaEstado)
                ->whereYear('fecha_facturacion', '=', $this->anno)
                ->whereMonth('fecha_facturacion', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->sum('valor_total');
        }
    }
}