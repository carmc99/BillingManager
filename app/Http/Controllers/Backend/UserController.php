<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
        $usuarios = User::all();
        return view('backend.usuarios.home', compact('usuarios'));
    }

    /**
        * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
        */
    public function create()
    {
        return view('backend.usuarios.register');
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
            'email' => 'required|min:3|max:50|unique:users,email',
            'identificacion' => 'min:3|max:30|required|unique:users,identificacion',
            'nombre' => 'min:3|max:80|required',
            'direccion' => 'min:3|max:100',
            'telefono_movil' => 'min:3|max:30',
            'telefono_fijo' => 'min:3|max:30',
            'contraseña' => 'min:6|required_with:confirmar_contraseña|same:confirmar_contraseña',
            'confirmar_contraseña' => 'min:6',
            'rol' => 'required'
        ]);
        $usuario = new User();
        $usuario->name = $request->input('nombre');
        $usuario->identificacion = $request->input('identificacion');
        $usuario->email = $request->input('email');
        $usuario->direccion = $request->input('direccion');
        $usuario->telefono_movil = $request->input('telefono_movil');
        $usuario->telefono_fijo = $request->input('telefono_fijo');
        $usuario->password = Hash::make($request->input('contraseña'));
        $usuario->save();
        $usuario->assignRole($request->input('rol'));

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
        $usuario = User::findOrFail($id);
        return view('backend.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('backend.usuarios.edit', compact('usuario'));
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
        $this->validate($request, [
            'email' => Rule::unique('users')->ignore($id),
            'identificacion' => Rule::unique('users')->ignore($id),
            'nombre' => 'min:3|max:80|required',
            'direccion' => 'min:3|max:100',
            'telefono_movil' => 'min:3|max:30',
            'telefono_fijo' => 'min:3|max:30',
            'rol' => 'required'
        ]);
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('nombre');
        $usuario->identificacion = $request->input('identificacion');
        $usuario->email = $request->input('email');
        $usuario->direccion = $request->input('direccion');
        $usuario->telefono_movil = $request->input('telefono_movil');
        $usuario->telefono_fijo = $request->input('telefono_fijo');
        $usuario->update();

        return redirect()->back()->with('message', 'Registro: ' . $usuario->name . ' actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrfail($id)->delete();
        return redirect()->back();
    }
}
