<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounsellorSchedule;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $schedules = CounsellorSchedule::orderBy('id', 'DESC')->paginate(10);

        return view('admin.pages.counselling.data', [
            'schedules' => $schedules
        ]);
    }

    public function show(CounsellorSchedule $schedule)
    {
        return view('admin.pages.counselling.data-detail', [
            'schedule' => $schedule
        ]);
    }
}
