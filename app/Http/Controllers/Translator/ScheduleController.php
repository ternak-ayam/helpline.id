<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('translator.pages.counselling.schedule', [
            'schedules' => Counselling::where('translator_id', auth('translator')->user()->id)->orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
