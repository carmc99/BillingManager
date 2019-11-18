<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Factura;
use App\Models\Recibo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Toastr;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_role_redirect');
    }

    public function index()
    {
        $empresa = Auth::user()->empresa_nit;
        $facturas = DB::table('facturas')->where('empresa_nit', '=',$empresa)->get();
        return view('frontend.facturas.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        $recibos = Recibo::query()->where('factura_id', '=', $factura->num_factura)
            ->where('empresa_nit', '=', $factura->empresa_nit)->get();
        return view('frontend.facturas.show', compact('factura','recibos'));
    }

    public function getFactura($id){
        $factura = Factura::findOrFail($id);
        $file = storage_path() . '/app/public/' . $factura->ruta_factura;
        if(file_exists($file))
        {
            return response()->download($file);
        }
        return abort(404);
    }

}
