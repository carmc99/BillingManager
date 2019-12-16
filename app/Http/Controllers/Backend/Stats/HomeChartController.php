<?php


namespace App\Http\Controllers\Backend\Stats;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeChartController extends Controller
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

        return view('backend.estadisticas.home');
    }

}
