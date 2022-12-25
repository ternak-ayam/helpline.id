<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    use HasFactory;

    protected $fillable = [
        'counselling_id',
        'counsellor_id',
        'translator_id',
        'user_id',
        'due',
        'counselling_method',
        'chat_url',
        'is_need_translator',
        'translator_language',
        'status',
    ];
}
