<?php

namespace App\Http\Controllers\Backend;

use App\Models\Empresa;
use App\Models\EmpresaGeneradora;
use App\Models\Factura;
use App\Models\User;
use Faker\Generator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Toastr;
use Illuminate\Support\Facades\Storage;

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
        $empresasGeneradoras = EmpresaGeneradora::query()->orderBy('nombre')->get();
        $empresas = Empresa::query()->orderBy('nombre')->get();
        return view('backend.facturas.register', compact('empresas', 'empresasGeneradoras'));
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
            'num-factura' => 'min:3|max:30|required|unique:facturas,num_factura',
            'cliente' => 'required|min:3|max:30',
            'generador' => 'required|min:3|max:30',
            'descripcion' => 'max:300',
            'fecha-factura' => 'required|date',
            'file' => 'required|max:10000|mimes:doc,docx,pdf'
        ]);

        $factura = new Factura();
        $factura->num_factura = $request->input('num-factura');
        $factura->empresa_nit = $request->input('cliente');
        $factura->descripcion = $request->input('descripcion');
        $factura->valor_total = $request->input('valor');
        $factura->valor_adeudado = $request->input('valor');
        $factura->empresa_generadora_nit = $request->input('generador');
        $factura->fecha_facturacion = $request->input('fecha-factura');
        $factura->ruta_factura = $factura->guardarFactura($request->file('file'), $request->input('cliente'));
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
        $recibos = $factura->recibos()->get();
        $test = $factura->recibos()->first();
        return view('backend.facturas.show', compact('factura', 'recibos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresasGeneradoras = EmpresaGeneradora::query()->orderBy('nombre')->get();
        $empresas = Empresa::query()->orderBy('nombre')->get();
        $factura = Factura::findOrFail($id);
        return view('backend.facturas.edit', compact('factura', 'empresas', 'empresasGeneradoras'));
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
        $factura = Factura::findOrfail($id);
        if($factura->recibo)
        {
            return redirect()->back()->with('error', 'El registro que intenta eliminar posee un recibo asociado: ' . $factura->recibo->num_recibo);
        }
        $factura->eliminarFactura($factura->ruta_factura);
        $factura->delete();
        return redirect()->back()->with('message', 'Registro eliminado exitosamente');
    }

    public function getFile($id){
        $factura = Factura::findOrFail($id);
        $file = storage_path() . '/app/public/' . $factura->ruta_factura;
        if(file_exists($file))
        {
            return response()->download($file);
        }
        return abort(404);
    }
}
