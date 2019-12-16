<?php

namespace App\Http\Controllers\Backend\Stats;

use App\Charts\FacturaChart;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class FacturaChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $facturaChart = new FacturaChart;
        $facturaChart->title('Por mes', 30, "rgb(36, 113, 163)", true, 'Helvetica Neue');
        $facturaChart->barwidth(0.0);
        $facturaChart->displaylegend(true);
        $facturaChart->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
        /*
        $facturaChart->dataset('Registradas este mes', 'line', [$facturaChart->getNumFacturasPorMes(1),
            $facturaChart->getNumFacturasPorMes(2),
            $facturaChart->getNumFacturasPorMes(3),
            $facturaChart->getNumFacturasPorMes(4),
            $facturaChart->getNumFacturasPorMes(5),
            $facturaChart->getNumFacturasPorMes(6),
            $facturaChart->getNumFacturasPorMes(7),
            $facturaChart->getNumFacturasPorMes(8),
            $facturaChart->getNumFacturasPorMes(9),
            $facturaChart->getNumFacturasPorMes(10),
            $facturaChart->getNumFacturasPorMes(11),
            $facturaChart->getNumFacturasPorMes(12)])
            ->color("rgb(36, 113, 163)")
            ->backgroundcolor("rgb(36, 113, 163)")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([5]);
*/
        $empresas = Empresa::select('nombre')
            ->distinct()
            ->get();
        $facturaChart->dataset('Por empresa', 'line', [1])
            ->color("rgb(36, 113, 163)")
            ->backgroundcolor("rgb(36, 113, 163)")
            ->fill(true)
            ->linetension(0.1)
            ->dashed([5]);



        return view('backend.estadisticas.facturas.facturaStats', ['chart' => $facturaChart]);
    }
}
