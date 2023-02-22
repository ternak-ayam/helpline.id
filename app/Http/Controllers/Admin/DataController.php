<?php

namespace App\Http\Controllers\Admin;

use App\Models\Counselling;
use Illuminate\Http\Request;
use App\Models\CounsellorSchedule;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function index()
    {
        $filter = \request()->get('filter');
        
        $schedules = Counselling::orderBy('id', 'DESC');

        if($filter == 'today') {
            $schedules = Counselling::orderBy('id', 'DESC')->whereDay('due', now()->format('d'));
        } else if($filter == 'this_month') {
            $schedules = Counselling::orderBy('id', 'DESC')->whereMonth('due', now()->month);
        } else if($filter == 'last_30') {
            $schedules = Counselling::orderBy('id', 'DESC')->whereBetween('due', [now()->subDays(90)->format('Y-m-d H:i:s'), now()->format('Y-m-d h:i:s')]);
        } else if($filter == 'last_7') {
            $schedules = Counselling::orderBy('id', 'DESC')->whereBetween('due', [now()->subDays(7)->format('Y-m-d H:i:s'), now()->format('Y-m-d h:i:s')]);
        }

        return view('admin.pages.counselling.data', [
            'schedules' => $schedules->paginate(10),
            'booked' => $schedules->where('status', Counselling::BOOKED)->count(),
            'success' => $schedules->where('status', Counselling::SUCCESS)->count(),
            'failed' => $schedules->where('status', Counselling::FAILED)->count(),
        ]);
    }

    public function show(CounsellorSchedule $schedule)
    {
        return view('admin.pages.counselling.data-detail', [
            'schedule' => $schedule
        ]);
    }
}
