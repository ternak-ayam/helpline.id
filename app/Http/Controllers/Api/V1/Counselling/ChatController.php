<?php

namespace App\Http\Controllers\Api\V1\Counselling;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\MessagesResource;
use App\Models\Counselling;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function store(Request $request, $counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        $message = new Message();

        $message->fill([
            'user_id' => $request->userId,
            'counselling_id' => $counselling->id,
            'user_type' => $request->userType,
            'text' => $request->text,
            'type' => $request->type,
        ]);

        if(!blank($request->attachment)) {
            $message->attachment = $request->attachment;
        }

        $message->saveOrFail();

        return $this->success();
    }

    public function show($counsellingId)
    {
        $counselling = Counselling::where('counselling_id', $counsellingId)->first();

        $messages = Message::where('counselling_id', $counselling->id)->get();

        return MessagesResource::collection($messages);
    }
}
