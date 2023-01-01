<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    public function index()
    {
        return view('psychologist.pages.counselling.patients.index', [
            'schedules' => Counselling::where('counsellor_id', auth('counsellor')->user()->id)->orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    public function show(Counselling $counselling)
    {
        return view('psychologist.pages.counselling.patients.show');
    }
}
