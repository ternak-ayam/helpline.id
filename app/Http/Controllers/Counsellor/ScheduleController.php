<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('psychologist.pages.counselling.schedule', [
            'schedules' => Counselling::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
