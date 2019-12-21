<?php


namespace App\Charts\QueryProvider;

use Illuminate\Support\Facades\DB;

class EstadoDeCuenta
{
    private $anno;
    private $generador;

    public function __construct($generador, $anno)
    {
        $this->anno = $anno;
        $this->generador = $generador;
    }

    public function getValorTotalFacturas($mes, $facturaEstado = null){
        if($facturaEstado == null)
        {
            return DB::table('facturas')
                ->whereYear('fecha_facturacion','=', $this->anno)
                ->whereMonth('fecha_facturacion', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->sum('valor_total');
        }else{
            return DB::table('facturas')
                ->where('estado_id', '=', $facturaEstado)
                ->whereYear('fecha_facturacion','=', $this->anno)
                ->whereMonth('fecha_facturacion', '=', $mes)
                ->where('empresa_generadora_nit', '=', $this->generador)
                ->sum('valor_total');
        }
    }

}