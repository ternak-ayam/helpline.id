<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use App\Models\PatientRecord;
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
        return view('psychologist.pages.counselling.patients.show', [
            'counselling' => $counselling,
            'patient' => $counselling->patientRecords,
            'issues' => json_decode($counselling->patientRecords->issues, true)['issues']
        ]);
    }

    public function update(Request $request, Counselling $counselling)
    {
        $counselling->patientRecords()->updateOrCreate(['counsellor_id' => $counselling->counsellor_id], $request->except(['_token', '_method', 'issues']));
        $counselling->patientRecords()->update([
            'issues' => json_encode($request->only(['issues']))
        ]);

        return redirect(route('psychologist.counselling.patient.index'));
    }
}
