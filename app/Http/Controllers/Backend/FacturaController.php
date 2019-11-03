<?php

namespace App\Http\Controllers\Backend;

use App\Models\Factura;
use App\Models\User;
use Faker\Generator;
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
    }

    public function index()
    {
        $facturas = Factura::all();

        return view('backend.facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.facturas.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);
        $factura = new Factura();
        $factura->num_pago = $request->input('');
        $factura->empresa = $request->input('');
        $factura->descripcion = $request->input('empresa');
        $factura->valor_total = $request->input('');
        $factura->fecha_facturacion = $request->input('');
        $factura->estado = false;
        $factura->saveOrFail();


        return redirect()->back()->with('message', 'Registro ingresado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);

        return view('backend.facturas.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        return view('backend.facturas.edit', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factura = Factura::findOrfail($id);

        return redirect()->back()->with('message', 'Registro: ' . $factura->num_pago . ' actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factura::findOrfail($id)->delete();
        return redirect()->back();
    }
}
