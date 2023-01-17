<?php

namespace App\Http\Controllers\Api\V1\Counselling\User;

use App\Http\Controllers\Api\V1\AccessTokenController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Counselling\StoreCounsellingRequest;
use App\Http\Resources\Api\V1\User\Counselling\CounsellorDetailResource;
use App\Models\Admin;
use App\Models\Counselling;
use App\Models\CounsellorSchedule;
use App\Models\Translator;
use App\Notifications\SendBookingDetailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounsellingController extends Controller
{
    public function store(StoreCounsellingRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $counsellingId = (new Counselling())->generateCounsellingId($request->schedule);

            if ($request->translator_language) {
                $request->validate([
                    'translator_language' => ['exists:translators,language']
                ], [
                    'translator_language.exists' => 'Translator is not available'
                ]);
            }

            $translatorId = $this->needTranslator($request) ? Translator::where('language', $request->translator_language)->inRandomOrder()->first()->id : null;

            $counselling = Counselling::create([
                'counselling_id' => $counsellingId,
                'counsellor_id' => $request->counsellor_id,
                'translator_id' => $translatorId,
                'user_id' => $user->id,
                'due' => Carbon::create($request->schedule),
                'counselling_method' => $request->counselling_method,
                'chat_url' => url($request->counselling_method . '/' . $counsellingId),
                'is_need_translator' => $this->needTranslator($request),
                'translator_language' => $request->translator_language,
            ]);

            CounsellorSchedule::create([
                'counsellor_id' => $request->counsellor_id,
                'counselling_id' => $counselling->id,
                'date' => $counselling->due->format('Y-m-d'),
                'time' => $counselling->due->format('H:i'),
                'datetime' => $counselling->due,
            ]);

            $token = (new AccessTokenController())->generate($counselling);

            $admin = Admin::where('email', 'hellohelpline@gmail.com')->first();

            $admin->notify(new SendBookingDetailNotification($counselling, $token['user_token'], $admin));

            $user->notify(new SendBookingDetailNotification($counselling, $token['user_token'], $user));
            $counselling->counsellor->notify(new SendBookingDetailNotification($counselling, $token['counsellor_token'], $counselling->counsellor));

            if ($counselling->translator_id) {
                $counselling->translator->notify(new SendBookingDetailNotification($counselling, $token['translator_token'], $counselling->translator));
            }

            return $this->success();
        });
    }

    public function needTranslator($request): bool
    {
        return !blank($request->translator_language);
    }

    public function show(Counselling $counselling)
    {
        return new CounsellorDetailResource($counselling);
    }
}
