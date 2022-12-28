<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslatorCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'translator_id',
        'counselling_id',
        'duration',
        'end_at'
    ];
}
