<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\CounsellingHistories;
use App\Http\Controllers\Controller;
use App\Models\Counselling;
use App\Models\Counsellor;
use App\Models\Translator;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatisticController extends Controller
{
    public function index()
    {
        $totalCounselling = Counselling::count();
        $totalCounsellors = Counsellor::count();
        $totalUsers = User::count();
        $totalTranslators = Translator::count();

        $users = User::orderby('id', 'DESC')->paginate(10);

        return view('admin.pages.counselling.statistics',
            compact('totalCounselling', 'totalCounsellors', 'totalUsers', 'totalTranslators', 'users'));
    }

    public function show(User $user)
    {
        $dates = [];
        $faileds = [];
        $successes = [];

        $recentCounsellings = Counselling::where('user_id', $user->id)->whereDate('due', '<=', today()->format('Y-m-d'))->orderby('id', 'DESC')->limit(5)->get();
        $counsellingDetails = Counselling::where('user_id', $user->id)->orderby('id', 'DESC')->paginate(10);

        for($today = 1; $today <= 7; $today++) {
            $dates[] = now()->subDays($today)->format('F j, Y');
            $faileds[] = Counselling::where('user_id', $user->id)->where('status', Counselling::FAILED)->whereDate('due', now()->subDays($today)->format('Y-m-d'))->count();
            $successes[] = Counselling::where('user_id', $user->id)->where('status', Counselling::SUCCESS)->whereDate('due', now()->subDays($today)->format('Y-m-d'))->count();
        }

        return view('admin.pages.counselling.detail-statistic',
            compact('dates', 'faileds', 'successes', 'recentCounsellings', 'counsellingDetails'));
    }

    public function export(User $user)
    {
        return Excel::download(new CounsellingHistories($user), now()->format('Y-m-d').'-counselling-histories.xlsx');
    }
}
