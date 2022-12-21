<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'institution',
        'major'
    ];
}
