<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecordQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'type',
        'key',
        'max_value',
        'questionable',
        'default_value',
    ];
}
