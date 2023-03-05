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

        $this->solveLogic($counselling, $counsellingId);

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
        
         $this->solveLogic($counselling, $counsellingId);

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

        $this->solveLogic($counselling, $counsellingId);

        TranslatorCall::where([['counselling_id', $counselling->id], ['translator_id', $request->userId]])->update([
            'duration' => $request->duration,
            'end_at' => now()
        ]);
    }

    public function solveLogic($counselling, $counsellingId)
    {
        $userCall = UserCall::where([['counselling_id', $counselling->id]])->first();
        $transCall = TranslatorCall::where([['counselling_id', $counselling->id]])->first();
        $counsellorCall = CounsellorCall::where([['counselling_id', $counselling->id]])->first();

        $status = false;

        if((bool) $counselling->is_need_translator) {
            $status = !blank($userCall) && !blank($transCall) && !blank($counsellorCall);
        } else {
            $status = !blank($userCall) && !blank($counsellorCall);
        }

        if((bool) $status) {
            Counselling::where('id', $counselling->id)->update([
                'status' => Counselling::SUCCESS
            ]);
        } else {
            Counselling::where('id', $counselling->id)->update([
                'status' => Counselling::FAILED
            ]);
        }
    }
}
