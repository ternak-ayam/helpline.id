<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'counselling_id',
        'issues',
        'counsellor_name',
        'client_name',
        'counselling_date',
        'session',
        'consultation_package',
        'client_birthdate',
        'client_address',
        'informed_consent',
        'is_sex_harassment',
        'is_client_agree',
        'referred_to',
        'referred_reason',
        'complaint',
        'assessment_method',
        'assessment_result',
        'client_data',
        'psychologist_history',
        'medical_history',
        'client_history',
        'law_history',
        'traumatic_history',
        'observation_result',
        'psychological_symptoms',
        'symptoms_management',
        'assessment_risk',
        'suicide_thinking',
        'suicide_attempt',
        'another_risk',
        'need_referred',
        'conclusion',
        'treatment_recommend',
        'session_obstacle',
    ];

    protected $dates = [
        'client_birthdate', 'counselling_date'
    ];

    const YES = "YES";
    const NO = "NO";
}
