<?php

namespace App\Http\Resources\Api\V1\User\Counsellor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDetailCounsellorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'bio' => $this->bio,
            'profilePicture' => $this->getImageUrl(),
            'languages' => GetCounsellorLanguageResource::collection($this->languages),
            'educations' => GetCounsellorEducationResource::collection($this->educations),
            'schedules' => GetCounsellorScheduleResource::collection($this->schedules),
            'calendars' => $this->getCalendars()
        ];
    }

    public function getCalendars(): array
    {
        $calendars = [];

        for ($i = 1; $i <= 7; $i++) {
            $datetime = Carbon::create(now()->addDays($i)->format('Y-m-d'));
            $date = $datetime->format('Y-m-d');

            $calendars[] = [
                "date" => $date,
                "times" => [
                    "09:15",
                    "10:15",
                    "11:15"
                ]
            ];
        }

        return $calendars;
    }
}
