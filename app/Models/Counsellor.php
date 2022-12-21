<?php

namespace App\Models;

use App\Models\Traits\HandleUpload;
use App\Models\Traits\HashPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Counsellor extends Authenticatable
{
    use HasFactory, HashPassword, HandleUpload;

    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
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

    public function imageAttribute(): string
    {
        return 'image';
    }
}
