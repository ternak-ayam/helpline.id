<?php

namespace Database\Seeders;

use App\Models\PatientRecordQuestion;
use Illuminate\Database\Seeder;

class PatientRecordQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patientRecordQuestions = file_get_contents(storage_path('app/patientRecordQuestions.json'));

        foreach (json_decode($patientRecordQuestions, true) as $patient) {
            PatientRecordQuestion::create([
                'no' => $patient['no'] ?? "",
                'question' => $patient['question'],
                'type' => $patient['type'],
                'key' => $patient['key'],
                'max_value' => $patient['max_value'],
                'questionable' => $patient['questionable'],
                'default_value' => $patient['default_value'],
            ]);
        }
    }
}
