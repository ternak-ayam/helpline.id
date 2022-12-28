<?php

namespace App\Http\Controllers\Api\V1\Counselling;

use App\Http\Controllers\Controller;
use App\Models\Counselling;
use App\Models\UserCall;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function storeUser(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();
        $userCall = UserCall::where([['counselling_id', $counselling->id], ['user_id', $request->userId]])->first();

        if (!$userCall) {
            UserCall::create([
                'counselling_id' => $counselling->id,
                'user_id' => $request->userId,
            ]);
        }
    }

    public function updateUser(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        UserCall::where([['counselling_id', $counselling->id], ['user_id', $request->userId]])->update([
            'duration' => $request->duration,
            'end_at' => now()
        ]);
    }

    public function translator(Request $request, $counsellingId)
    {
        //
    }

    public function counsellor(Request $request, $counsellingId)
    {
        //
    }
}
