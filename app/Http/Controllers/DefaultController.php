<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class DefaultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thisWeek = \Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        $this->data['thisWeekVisitors'] = $thisWeek->pluck('visitors');

        $startDate = Carbon::now()->subDays(7)->startOfWeek();
        $endDate = Carbon::now();
        $lastWeek=\Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate,$endDate));
        $this->data['lastWeekVisitors'] =  $lastWeek->pluck('visitors');
        return view('home',$this->data);
        // var_dump($vistedPage);
    }
}
