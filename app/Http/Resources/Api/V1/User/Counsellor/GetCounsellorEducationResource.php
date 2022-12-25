<?php

namespace App\Http\Resources\Api\V1\User\Counsellor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetCounsellorEducationResource extends JsonResource
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
            'institution' => $this->institution,
            'major' => $this->major,
        ];
    }
}
