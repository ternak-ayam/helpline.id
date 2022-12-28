<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'counselling_id',
        'duration',
        'end_at'
    ];
}
