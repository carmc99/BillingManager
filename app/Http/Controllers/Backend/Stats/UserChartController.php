<?php

namespace App\Http\Controllers\Backend\Stats;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\UserChart;


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
        $usersChart = new UserChart;
        $usersChart->title('Usuarios por Mes', 30, "rgb(255, 99, 132)", true, 'Helvetica Neue');
        $usersChart->barwidth(0.0);
        $usersChart->displaylegend(false);
        $usersChart->labels(['Enero', 'Febrero', 'Mar', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
        $usersChart->dataset('Registrados este mes', 'line', [$usersChart->getMonthUsersCount(1), $usersChart->getMonthUsersCount(2), $usersChart->getMonthUsersCount(3), $usersChart->getMonthUsersCount(4), $usersChart->getMonthUsersCount(5), $usersChart->getMonthUsersCount(6), $usersChart->getMonthUsersCount(7), $usersChart->getMonthUsersCount(8), $usersChart->getMonthUsersCount(9), $usersChart->getMonthUsersCount(10), $usersChart->getMonthUsersCount(11), $usersChart->getMonthUsersCount(12)])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1)
            ->dashed([5]);
        return view('backend.estadisticas.usuarios.usersStats', ['chart' => $usersChart]);
    }

}
