<?php


namespace App\Charts\QueryProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

class EmpresaReporte
{
    public function __construct()
    {

    }

    public function topDeudores(){
        return DB::select('select count(num_factura) as cantFacturas, empresas.nombre from facturas inner join empresas on facturas.empresa_nit = empresas.nit where estado_id = 3 group by empresa_nit order by count(num_factura) desc limit 5;');
    }

    public function getUltimasEmpresasRegistradas(){

    }
}