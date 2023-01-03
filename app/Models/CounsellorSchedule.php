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

    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class, 'counsellor_id');
    }
    public function counselling()
    {
        return $this->belongsTo(Counselling::class, 'counselling_id');
    }
}
