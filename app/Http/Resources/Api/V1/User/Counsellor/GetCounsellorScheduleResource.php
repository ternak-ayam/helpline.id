<?php

namespace App\Http\Resources\Api\V1\User\Counsellor;

use Illuminate\Http\Resources\Json\JsonResource;

class GetCounsellorScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->datetime->format('Y-m-d H:i');
    }
}
