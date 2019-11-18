<?php

namespace App\Http\Controllers\Backend;

use App\Models\Empresa;
use App\Models\EmpresaGeneradora;
use App\Models\Factura;
use App\Models\Recibo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibos = Recibo::all();
        return view('backend.recibos.index', compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.recibos.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'num-recibo' => 'numeric|min:3|required',
            'cliente' => 'required|min:3|max:30',
            'factura_id' => 'required',
            'valor-abono' => 'required',
            'generador' => 'required|min:3|max:30',
            'descripcion' => 'max:300',
            'fecha-recibo' => 'required|date',
            'file' => 'required|max:10000|mimes:doc,docx,pdf'
        ]);
        $factura = Factura::query()->where('num_factura', '=',$request->input('factura_id'))->first();
        $recibo = new Recibo();
        $recibo->num_recibo = $request->input('num-recibo');
        $recibo->factura_id = $request->input('factura_id');
        $recibo->empresa_nit = $request->input('cliente');
        $recibo->valor_abono = (int) $request->input('valor-abono');
        $recibo->empresa_generadora_nit = $request->input('generador');
        $recibo->descripcion = $request->input('descripcion');
        $recibo->fecha_recibo = $request->input('fecha-recibo');
        $recibo->ruta_recibo = $recibo->guardarRecibo($request->file('file'), $request->input('cliente'));


        if($recibo->valor_abono == $factura->valor_total){
            $factura->estado = true;
            $factura->valor_adeudado = 0;
            $factura->update();
        }
        if($recibo->valor_abono < $factura->valor_total){
            $factura->valor_adeudado -= $recibo->valor_abono;
            if($factura->valor_adeudado <= 0){
                $factura->estado = true;
            }
            $factura->update();
        }
        if($recibo->valor_abono > $factura->valor_total) {
            return redirect()->back()->with('error', 'El valor del recibo supera el valor de la factura');
        }
        $recibo->save();

        return redirect()->back()->with('message', 'Registro ingresado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Recibo::findOrFail($id);
        return view('backend.recibos.show', compact('recibo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recibo = Recibo::findOrFail($id);
        $empresasGeneradoras = EmpresaGeneradora::query()->orderBy('nombre')->get();
        $empresas = Empresa::query()->orderBy('nombre')->get();
        return view('backend.recibos.edit', compact('empresasGeneradoras', 'empresas', 'recibo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recibo = Recibo::findOrfail($id);
        $facturas = Factura::query()->where('num_factura','=', $recibo->factura->num_factura)->get();
        foreach ($facturas as $factura)
        {
            $factura->estado = false;
            $factura->update();
        }
        $recibo->eliminarRecibo($recibo->ruta_recibo);
        $recibo->delete();
        return redirect()->back();
    }

    public function getFile($id){
        $recibo = Recibo::findOrFail($id);
        $file = storage_path() . '/app/public/' . $recibo->ruta_recibo;
        if(file_exists($file))
        {
            return response()->download($file);
        }
        return abort(404);
    }
}
