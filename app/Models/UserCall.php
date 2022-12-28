<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'counselling_id',
        'duration',
        'end_at'
    ];

    protected $attributes = [
        'duration' => 0
    ];
}
