<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'counselling_id',
    ];

    const YES = "YES";
    const NO = "NO";

    public function details()
    {
        return $this->hasMany(PatientRecordDetail::class, 'patient_record_id');
    }
}
