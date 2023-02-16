<?php

namespace App\Http\Resources\Api\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
