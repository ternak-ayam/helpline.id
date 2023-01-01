<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    use HasFactory;

    protected $fillable = [
        'counselling_id',
        'counsellor_id',
        'translator_id',
        'user_id',
        'due',
        'counselling_method',
        'chat_url',
        'is_need_translator',
        'translator_language',
        'status',
    ];

    const BOOKED = "BOOKED";
    const ENDED  = "ENDED";

    const TEXTCHAT  = "text-chat";
    const AUDIOCHAT  = "audio-chat";

    protected $attributes = [
        'status' => self::BOOKED
    ];

    protected $dates = [
        'due'
    ];

    public function getChatUrl()
    {
        $userId = $this->user_id;

        if(auth('counsellor')->check()) {
            $userId = $this->counsellor_id;
        } else if(auth('translator')->check()) {
            $userId = $this->translator_id;
        }

        $token = ChatAccessToken::where([['user_id', $userId], ['counselling_id', $this->id]])->first();

        return $this->chat_url . '?token=' . $token->token;
    }

    public function getCounsellingMethod()
    {
        if($this->counselling_method === self::TEXTCHAT) {
            return "Text Chat";
        }

        return "Audio Chat";
    }

    public function accessToken()
    {
        return $this->hasMany(ChatAccessToken::class, 'counselling_id');
    }

    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class, 'counsellor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function translator()
    {
        return $this->belongsTo(Translator::class, 'translator_id');
    }

    public function generateCounsellingId($due)
    {
        $user = auth()->user();

        return 'CBI-C-' . now()->format('Ymd') . $user->id . Carbon::create($due)->format('hi') . rand(0, 9);
    }
}
