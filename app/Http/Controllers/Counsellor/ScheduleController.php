<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\CounsellorSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = CounsellorSchedule::where('counsellor_id', auth('counsellor')->user()->id)->orderBy('id', 'DESC')->paginate(10);

        return view('psychologist.pages.counselling.schedule', [
            'schedules' => $schedules
        ]);
    }

    public function show(CounsellorSchedule $schedule)
    {
        return view('psychologist.pages.counselling.schedule-detail', [
            'schedule' => $schedule
        ]);
    }
}
