<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatAccessTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'counselling_id' => $this->counselling_id,
            'user_id' => $this->user_id,
            'user_type' => $this->owner_type,
            'counsellor_image' => $this->counselling['counsellor']->getImageUrl()
        ];
    }
}
