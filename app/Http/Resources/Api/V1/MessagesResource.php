<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = env('MIX_DEFAULT_PROFILE_PICTURE');

        if($this->user_type === "counsellor") {
            $image = $this->counsellor->getImageUrl();
        } else if($this->user_type === "translator") {
            $image = "https://i.stack.imgur.com/dr5qp.jpg";
        }

        return [
            'user' => [
                'image' => $image
            ],
            'userId' => $this->user_id,
            'userType' => $this->user_type,
            'text' => $this->text,
            'attachment' => $this->hasImage() ? $this->getImageUrl() : null,
            'type' => $this->type,
        ];
    }
}
