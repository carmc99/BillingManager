<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('backend.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.empresas.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
                'email' => 'required|min:3|max:50|unique:empresas,correo',
                'nit' => 'min:3|max:30|required|unique:empresas,nit',
                'nombre' => 'min:3|max:80|required',
                'direccion' => 'min:3|max:100',
                'telefono' => 'min:3|max:30',
            ]);

            $empresa = new Empresa();
            $empresa->nit = $request->input('nit');
            $empresa->correo = $request->input('email');
            $empresa->nombre = $request->input('nombre');
            $empresa->direccion = $request->input('direccion');
            $empresa->telefono = $request->input('telefono');
            $empresa->saveOrFail();

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
        $empresa = DB::table('empresas')->where('nit', $id)->first();
        return view('backend.empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = DB::table('empresas')->where('nit', $id)->first();
        return view('backend.empresas.edit', compact('empresa'));
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
        $empresa = DB::table('empresas')->where('nit', $id)->first();

    }
}
