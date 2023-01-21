<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslatorAvailableTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'translator_id',
        'day',
        'start_at',
        'end_at'
    ];
}
