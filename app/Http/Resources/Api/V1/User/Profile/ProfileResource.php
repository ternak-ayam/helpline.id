<?php

namespace App\Http\Resources\Api\V1\User\Profile;

use App\Http\Resources\Api\V1\User\Counselling\CounsellingHistoryResource;
use App\Models\Counselling;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'unhcr_number' => $this->unhcr_number,
            'country' => $this->country,
            'birthdate' => $this->birthdate,
            'sex' => $this->sex,
            'counselling_histories' => CounsellingHistoryResource::collection($this->counsellings()->where('status', '<>', Counselling::BOOKED)->get())
        ];
    }
}
