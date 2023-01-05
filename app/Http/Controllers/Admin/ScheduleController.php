<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use App\Models\CounsellorSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = CounsellorSchedule::orderBy('id', 'DESC')->paginate(10);

        return view('admin.pages.counselling.schedule', [
            'schedules' => $schedules
        ]);
    }
}
