<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAccessToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'counselling_id',
        'user_id',
        'owner_type',
        'token',
    ];

    public function counselling()
    {
        return $this->belongsTo(Counselling::class, 'counselling_id');
    }
}
