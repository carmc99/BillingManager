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
        return DB::table('facturas');
    }

    public function getUltimasEmpresasRegistradas(){

    }
}