<?php

namespace App\Http\Controllers\Backend\Stats;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('backend.estadisticas.usuarios.usersStats');
    }

}
