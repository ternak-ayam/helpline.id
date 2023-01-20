<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorAvailableTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'day',
        'start_at',
        'end_at'
    ];
}
