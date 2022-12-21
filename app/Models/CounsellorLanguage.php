<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'language'
    ];
}
