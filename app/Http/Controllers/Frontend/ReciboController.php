<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recibo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReciboController extends Controller
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
        $recibos = Recibo::query()->where('empresa_nit', '=', $empresa)->get();
        return view('frontend.recibos.index', compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
