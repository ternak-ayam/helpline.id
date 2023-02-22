<?php

namespace App\Http\Controllers\Counsellor;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Counselling;
use App\Models\PatientRecord;
use App\Models\PatientRecordDetail;
use App\Models\PatientRecordQuestion;
use App\Notifications\EmergencySupportNotification;
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
        $issues = $counselling->fetchPatientRecords();

        return view('psychologist.pages.counselling.patients.show', [
            'counselling' => $counselling,
            'issues' => optional($issues),
        ]);
    }

    public function update(Request $request, Counselling $counselling)
    {
        $patientRecord = $counselling->patientRecords;

        if (!$patientRecord) {
            $patientRecord = PatientRecord::create([
                'counselling_id' => $counselling->id
            ]);
        }

        PatientRecordDetail::where('patient_record_id', $patientRecord->id)->delete();

        foreach ($request->issues as $key => $issue) {
            $question = PatientRecordQuestion::where('key', $key)->first();

            if($question) {
                PatientRecordDetail::updateOrCreate([
                    'patient_record_id' => $patientRecord->id,
                    'question_id' => $question->id,
                ],
                [
                    'question_id' => $question->id,
                    'patient_record_id' => $patientRecord->id,
                    'answer' => $issue,
                ]);
            }
        }

        if ($request->issues['emergency_support'] === PatientRecord::YES) {
            $cities = City::where('name', $counselling->user['city'])->get();
            $global = City::where('name', City::GLOBAL)->get();

            if($url = $counselling->saveAndGetUrl()) {
                if (count($cities) > 0) {
                    foreach($cities as $city) {   
                        $city->notify(new EmergencySupportNotification($url, $counselling->user));
                    }
                }

                if (count($global) > 0) {
                    foreach($global as $glo) {   
                        $glo->notify(new EmergencySupportNotification($url, $counselling->user));
                    }
                }
            }
        }

        return redirect(route('psychologist.counselling.patient.index'));
    }

    public function download(Counselling $counselling)
    {
        return $counselling->export();
    }
}
