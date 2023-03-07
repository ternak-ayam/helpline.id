<?php

namespace App\Http\Controllers\Api\V1\Counselling;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use App\Models\CounsellorCall;
use App\Models\TranslatorCall;
use App\Models\UserCall;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function storeUser(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

            UserCall::create([
                'counselling_id' => $counselling->id,
                'user_id' => $request->userId,
            ]);
    
    }

    public function updateUser(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        UserCall::where([['counselling_id', $counselling->id], ['user_id', $request->userId]])->update([
            'duration' => $request->duration,
            'end_at' => now()
        ]);
    }

    public function storeCounsellor(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        CounsellorCall::create([
            'counselling_id' => $counselling->id,
            'counsellor_id' => $request->userId,
        ]);
    }

    public function updateCounsellor(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        CounsellorCall::where([['counselling_id', $counselling->id], ['counsellor_id', $request->userId]])->update([
            'duration' => $request->duration,
            'end_at' => now()
        ]);
    }

    public function storeTranslator(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        TranslatorCall::create([
            'counselling_id' => $counselling->id,
            'translator_id' => $request->userId,
        ]);
    }

    public function updateTranslator(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        TranslatorCall::where([['counselling_id', $counselling->id], ['translator_id', $request->userId]])->update([
            'duration' => $request->duration,
            'end_at' => now()
        ]);
    }
}
