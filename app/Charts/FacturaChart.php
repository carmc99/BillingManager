<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class FacturaChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getNumFacturasPorMes($month){
        return DB::table('facturas')
            ->whereMonth('created_at', '=', $month)
            ->count('num_factura');
    }

    public function getNumFacturasPorEmpresa($month){
        return DB::table('users')
            ->whereMonth('created_at', '=', $month)
            ->count('email');
    }
    /*
        public function getNumFacturasPorGenerador($month){
            return DB::table('users')
                ->whereMonth('created_at', '=', $month)
                ->count('email');
        }

        public function getNumFacturasPorEstado($month){
            return DB::table('users')
                ->whereMonth('created_at', '=', $month)
                ->count('email');
        }

        public function getNumFacturasPorRangoFechas($month){
            return DB::table('users')
                ->whereMonth('created_at', '=', $month)
                ->count('email');
        }

        public function getSaldoPorGenerador($month){
            return DB::table('users')
                ->whereMonth('created_at', '=', $month)
                ->count('email');
        }

        public function getSaldoPorCliente($month){
            return DB::table('users')
                ->whereMonth('created_at', '=', $month)
                ->count('email');
        }
    */
}
