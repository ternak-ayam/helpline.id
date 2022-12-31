<?php

namespace App\Http\Resources\Api\V1\User\Counselling;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CounsellorDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|
     */
    public function toArray($request): array
    {
       if(auth('translator')->check()) {
           $userType = "translator";
           $userId = auth('translator')->user()->id;
       } elseif (auth('counsellor')->check()) {
           $userType = "counsellor";
           $userId = auth('counsellor')->user()->id;
       } else {
           $userType = "user";
           $userId = auth()->user()->id;
       };

        return [
            'id' => $this->counsellor['id'],
            'name' => $this->counsellor['name'],
            'profilePicture' => $this->counsellor->getImageUrl(),
            'user' => [
                'id' => $userId,
                'type' => $userType
            ]
        ];
    }
}
