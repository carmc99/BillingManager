<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class UserChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getMonthUsersCount($month){
        return DB::table('users')
            ->whereMonth('created_at', '=', $month)
            ->count('email');
    }


}
