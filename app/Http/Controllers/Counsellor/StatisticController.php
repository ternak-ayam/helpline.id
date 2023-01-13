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
        $completedCounselling = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::DONE]])->count();
        $upcomingCounselling = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::BOOKED]])->whereDate('due', '>', today()->format('Y-m-d'))->count();
        $recentCounsellings = Counselling::where('counsellor_id', auth()->user()->id)->whereDate('due', '<=', today()->format('Y-m-d'))->orderby('id', 'DESC')->limit(5)->get();

        $dates = [];
        $counsellings = [];
        $completeds = [];

        for($today = 1; $today <= 7; $today++) {
            $dates[] = now()->subDays($today)->format('F j, Y');
            $counsellings[] = Counselling::where('counsellor_id', auth()->user()->id)->whereDate('due', now()->subDays($today)->format('Y-m-d'))->count();
            $completeds[] = Counselling::where([['counsellor_id', auth()->user()->id], ['status', Counselling::DONE]])->whereDate('due', now()->subDays($today)->format('Y-m-d'))->count();
        }

        return view('psychologist.pages.counselling.statistics',
            compact('todayCounselling', 'completedCounselling',
                'totalCounselling', 'upcomingCounselling', 'recentCounsellings', 'dates', 'counsellings', 'completeds'));
    }
}
