<?php

namespace App\Http\Resources\Api\V1\User\Counsellor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetCounsellorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'profilePicture' => $this->getImageUrl(),
        ];
    }
}
