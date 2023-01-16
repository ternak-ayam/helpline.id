<?php

namespace App\Http\Resources\Api\V1\User\Counselling;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CounsellingHistoryResource extends JsonResource
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
          'counselling_id' => $this->counselling_id,
          'counsellor' => $this->counsellor['name'],
          'translator' => $this->translator['name'],
          'counselling_time' => $this->due
        ];
    }
}
