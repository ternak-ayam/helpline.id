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
       } elseif (auth('counsellor')->check()) {
           $userType = "counsellor";
       } else {
           $userType = "user";
       };

        return [
            'id' => $this->counsellor['id'],
            'name' => $this->counsellor['name'],
            'profilePicture' => $this->counsellor->getImageUrl(),
            'user' => [
                'id' => auth()->user()->id,
                'type' => $userType
            ]
        ];
    }
}
