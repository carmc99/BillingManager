<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Charts\QueryProvider\EstadoDeCuenta;

class EstadoCuentaChart extends Chart
{
    private $generador;
    private $anno;
    private $chartType;
    private $EstadoCuenta;

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
        $this->EstadoCuenta = new EstadoDeCuenta($this->generador, $this->anno);
        $this->title('Estado de cuenta');
        $this->displayLegend(true);
        $this->barWidth(0.5);
        $this->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
    }

    /*
     *  Funcion para obtener el saldo total en estado pago, por generador
     */
    public function datasetSaldoTotal($estado, $titulo, $color)
    {
        return $this->dataset($titulo, $this->chartType, [
            $this->EstadoCuenta->getValorTotalFacturas('01', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('02', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('03', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('04', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('05', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('06', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('07', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('08', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('09', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('10', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('11', $estado),
            $this->EstadoCuenta->getValorTotalFacturas('12', $estado)
        ])
            ->color($color)
            ->backgroundcolor($color);
    }
}
