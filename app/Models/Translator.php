<?php

namespace App\Models;

use App\Models\Traits\HashPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Translator extends Authenticatable
{
    use HasFactory, HashPassword, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'language',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
