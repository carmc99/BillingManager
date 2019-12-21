<?php

namespace App\Http\Controllers\Backend\Stats;

use App\Charts\EstadoCuentaChart;
use App\Charts\GeneralChart;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Charts\QueryProvider\FacturaReporte;
use App\Charts\FacturaChart;

class HomeChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($id = null)
    {
        if ($id == null) {
            $id = DB::table('empresas_generadoras')
                ->select('nit')
                ->pluck('nit')
                ->first();
        }
        $empresasGeneradoras = DB::table('empresas_generadoras')
            ->select(['nit', 'nombre'])
            ->get();

        $facturaReporte = new FacturaReporte($id, '2019');
        $totalFacturas = $facturaReporte->getCuentaFacturas(null);
        $totalSaldoPendienteFacturas = $facturaReporte->getValorTotalFacturas(null, 3);
        $totalSaldoPagoFacturas = $facturaReporte->getValorTotalFacturas(null, 1);

        $facturaChart = new FacturaChart('bar', $id, '2019');
        $facturaChart->datasetTotalFacturas(1, 'Pago', "rgba(41, 168, 71, 0.3)");
        $facturaChart->datasetTotalFacturas(2, 'Saldo a favor', "rgba(255, 193, 7, 0.59)");
        $facturaChart->datasetTotalFacturas(3, 'Pendiente', "rgba(220, 56, 72, 0.53)");
        $facturaChart->datasetTotalFacturas(null, 'Total', "rgba(0, 123, 255, 0.59)");

        $estadoDeCuenta = new EstadoCuentaChart('line', $id, '2019');
        $estadoDeCuenta->datasetSaldoTotal(1, 'Total pagos realizados ($)', "rgba(41, 168, 71, 0.5)");
        $estadoDeCuenta->datasetSaldoTotal(3, 'Total pendiente por pago($)', "rgba(220, 56, 72, 0.53)");
        $estadoDeCuenta->datasetSaldoTotal(null, 'Total ($)', "rgba(0, 123, 255, 0.59)");

        return view('backend.estadisticas.home', [
            'chart' => $facturaChart,
            'estadoDeCuenta' => $estadoDeCuenta,
            'empresasGeneradoras' => $empresasGeneradoras,
            'totalFacturas' => $totalFacturas,
            'totalSaldoPendienteFacturas' => $totalSaldoPendienteFacturas,
            'totalSaldoPagoFacturas' => $totalSaldoPagoFacturas
        ]);
    }
}
