<?php

namespace App\Charts;

use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Factura;
use Illuminate\Support\Facades\DB;
use App\Charts\QueryProvider\FacturaReporte;

class FacturaChart extends Chart
{
    private $generador;
    private $anno;
    private $chartType;
    private $FacturaReporte;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($chartType, $generador, $anno)
    {
        parent::__construct();
        $this->chartType = $chartType;
        $this->generador = $generador;
        $this->anno = $anno;
        $this->FacturaReporte = new FacturaReporte($this->generador, $this->anno);
        $this->title('Facturas');
        $this->displayLegend(true);
        $this->barWidth(0.5);
        $this->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
    }


    public function datasetTotalFacturas($estado, $titulo, $color)
    {
        $this->dataset($titulo, $this->chartType, [
            $this->FacturaReporte->getCuentaFacturas('01', $estado),
            $this->FacturaReporte->getCuentaFacturas('02', $estado),
            $this->FacturaReporte->getCuentaFacturas('03', $estado),
            $this->FacturaReporte->getCuentaFacturas('04', $estado),
            $this->FacturaReporte->getCuentaFacturas('05', $estado),
            $this->FacturaReporte->getCuentaFacturas('06', $estado),
            $this->FacturaReporte->getCuentaFacturas('07', $estado),
            $this->FacturaReporte->getCuentaFacturas('08', $estado),
            $this->FacturaReporte->getCuentaFacturas('09', $estado),
            $this->FacturaReporte->getCuentaFacturas('10', $estado),
            $this->FacturaReporte->getCuentaFacturas('11', $estado),
            $this->FacturaReporte->getCuentaFacturas('12', $estado)
        ])
            ->color($color)
            ->backgroundcolor($color);
    }
}
