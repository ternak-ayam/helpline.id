<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Message;
use App\Models\UserCall;
use App\Models\Counselling;
use App\Models\CounsellorCall;
use App\Models\TranslatorCall;
use Illuminate\Console\Command;

class StatusCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counselling:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counsellings = Counselling::where([['status', Counselling::BOOKED]])->get();

        $userNeed = 2;

        foreach ($counsellings as $key => $value) {
            $userJoins = Message::where([['counselling_id', $value->id]])->get()->unique('user_type')->count();

            if($value->is_need_translator) {
                $userNeed = 3;
            }

            if(($userJoins == $userNeed) && $value->counselling_method == Counselling::TEXTCHAT) {
                Counselling::where('id', $value->id)->update([
                    'status' => Counselling::SUCCESS
                ]);
            }

            $this->solveLogic($value);
        }

        $counsellings = Counselling::where([['status', Counselling::BOOKED]])->get();

        foreach ($counsellings as $key => $value) {
            if($this->past($value)) {
                Counselling::where('id', $value->id)->update([
                    'status' => Counselling::FAILED
                ]);
            }
        }
    }

    public function past($value)
    {
        return  (new Carbon($value->due, 'Asia/Jakarta'))->addMinutes(15)->timestamp <= now()->timestamp;
    }

    public function solveLogic($counselling)
    {
        $userCall = UserCall::where([['counselling_id', $counselling->id]])->first();
        $transCall = TranslatorCall::where([['counselling_id', $counselling->id]])->first();
        $counsellorCall = CounsellorCall::where([['counselling_id', $counselling->id]])->first();

        $status = false;

        if((bool) $counselling->is_need_translator) {
            $status = !blank($userCall) && !blank($transCall) && !blank($counsellorCall);
        } else {
            $status = !blank($userCall) && !blank($counsellorCall);
        }

        if((bool) $status) {
            Counselling::where('id', $counselling->id)->update([
                'status' => Counselling::SUCCESS
            ]);
        }
    }
}
