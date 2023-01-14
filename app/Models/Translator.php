<?php

namespace App\Models;

use App\Models\Traits\HashPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Translator extends Authenticatable
{
    use HasFactory, HashPassword, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'language',
        'timezone',
        'password',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
    ];
}
