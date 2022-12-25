<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'counselling_id',
        'date',
        'time',
        'datetime',
        'deleted_at',
    ];

    protected $dates = ['datetime'];
}
