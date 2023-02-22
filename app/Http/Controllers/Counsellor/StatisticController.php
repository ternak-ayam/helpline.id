<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $totalCounselling = Counselling::where('counsellor_id', auth()->user()->id)->count();
        $todayCounselling = Counselling::where('counsellor_id', auth()->user()->id)->whereDate('due', today()->format('Y-m-d'))->count();
        $failedCounselling = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::FAILED]])->count();
        $successCounselling = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::SUCCESS]])->whereDate('due', '>', today()->format('Y-m-d'))->count();
        $recentCounsellings = Counselling::where('counsellor_id', auth()->user()->id)->whereDate('due', '<=', today()->format('Y-m-d'))->orderby('id', 'DESC')->limit(5)->get();

        $dates = [];
        $successes = [];
        $faileds = [];

        for($today = 1; $today <= 7; $today++) {
            $dates[] = now()->subDays($today)->format('F j, Y');
            $successes[] = Counselling::where('counsellor_id', auth()->user()->id)->whereDate('due', now()->subDays($today)->format('Y-m-d'))->where('status', Counselling::SUCCESS)->count();
            $faileds[] = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::FAILED]])->whereDate('due', now()->subDays($today)->format('Y-m-d'))->count();
        }

        return view('psychologist.pages.counselling.statistics',
            compact('todayCounselling', 'failedCounselling',
                'totalCounselling', 'successCounselling', 'recentCounsellings', 'dates', 'successes', 'faileds'));
    }
}
