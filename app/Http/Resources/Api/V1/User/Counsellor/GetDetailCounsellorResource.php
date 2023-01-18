<?php

namespace App\Http\Resources\Api\V1\User\Counsellor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
        $i = 0;

        do {
            $datetime = Carbon::create(now()->addDays($i)->format('Y-m-d'));
            $date = $datetime->format('Y-m-d');

            if (in_array(Str::lower($datetime->format('l')), $this->availables->pluck('day')->toArray())) {
                $calendars[] = [
                    "date" => $date,
                    "times" => [
                        "09:15",
                        "10:15",
                        "11:15"
                    ]
                ];
            }

            $i++;
        }
        while(count($calendars) <= 6);

        return $calendars;
    }
}
