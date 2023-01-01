<?php

namespace App\Models;

use App\Models\Traits\HandleUpload;
use App\Models\Traits\HashPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Counsellor extends Authenticatable
{
    use HasFactory, HashPassword, HandleUpload, Notifiable;

    protected $with = ['educations', 'languages'];

    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
        'timezone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function educations()
    {
        return $this->hasMany(CounsellorEducation::class, 'counsellor_id');
    }

    public function languages()
    {
        return $this->hasMany(CounsellorLanguage::class, 'counsellor_id');
    }

    public function schedules()
    {
        return $this->hasMany(CounsellorSchedule::class, 'counsellor_id');
    }

    public function imageAttribute(): string
    {
        return 'image';
    }
}
