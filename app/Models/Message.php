<?php

namespace App\Models;

use App\Models\Traits\HandleUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, HandleUpload;

    protected $fillable = [
        'user_id',
        'counselling_id',
        'user_type',
        'text',
        'attachment',
        'type',
    ];

    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function translator()
    {
        return $this->belongsTo(Translator::class, 'user_id');
    }

    public function imageAttribute(): string
    {
        return 'attachment';
    }

    public function getImagePath(): string
    {
        return 'messages/attachments';
    }
}
