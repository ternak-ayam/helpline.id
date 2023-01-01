<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ChatAccessTokenResource;
use App\Models\ChatAccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccessTokenController extends Controller
{
    public function parse($accessToken)
    {
        $data = ChatAccessToken::where('token', $accessToken)->first();

        if(blank($data)) return response()->json([
            'message' => "You don't have access to this channel"
        ], 403);

        return new ChatAccessTokenResource($data);
    }

    public function generate($data)
    {
        $user = ChatAccessToken::create([
            'token' => Str::random(30),
            'user_id' => $data->user_id,
            'owner_type' => 'user',
            'counselling_id' => $data->id,
        ]);

        $counsellor = ChatAccessToken::create([
            'token' => Str::random(30),
            'user_id' => $data->counsellor_id,
            'owner_type' => 'counsellor',
            'counselling_id' => $data->id,
        ]);

        if ($data->is_need_translator && !blank($data->translator_id)) {
            $translator = ChatAccessToken::create([
                'token' => Str::random(30),
                'user_id' => $data->translator_id,
                'owner_type' => 'translator',
                'counselling_id' => $data->id,
            ]);
        }

        return [
            'user_token' => $user->token,
            'counsellor_token' => $counsellor->token,
            'translator_token' => !blank($data->translator_id) ? $translator->token : null,
        ];
    }
}
