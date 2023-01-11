<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecordDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'patient_record_id',
        'answer',
    ];

    public function question()
    {
        return $this->belongsTo(PatientRecordQuestion::class, 'question_id');
    }
}
