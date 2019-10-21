<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $facturas = Factura::all();
        return view('frontend.facturas.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::findOrFail($id);

        notify()->info('Are you the 6 fingered man?');
        return view('frontend.facturas.show', compact('factura'));
    }

}
