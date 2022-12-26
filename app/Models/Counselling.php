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

    protected $attributes = [
        'status' => self::BOOKED
    ];

    protected $dates = [
        'due'
    ];

    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class, 'counsellor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function generateCounsellingId($due)
    {
        $user = auth()->user();

        return 'CBI-C-' . now()->format('Ymd') . $user->id . Carbon::create($due)->format('hi') . rand(0, 9);
    }
}
