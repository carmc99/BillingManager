<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Factura;
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
        return view('frontend.facturas.show', compact('factura'));
    }

    public function getFactura($id){
        $factura = Factura::findOrFail($id);
        $file = storage_path() . '/app/public/' . $factura->ruta_factura;
        return response()->download($file);
    }

}
