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
          'counsellor' => isset($this->counsellor['name']) ? $this->counsellor['name'] : null,
          'translator' => isset($this->translato['name']) ? $this->translator['name'] : null,
          'counselling_time' => $this->due
        ];
    }
}
