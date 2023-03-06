<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Message;
use App\Models\Counselling;
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
                Counselling::where('counselling_id', $value->counselling_id)->update([
                    'status' => Counselling::SUCCESS
                ]);
            }
            
            if($this->past($value)) {
                Counselling::where('counselling_id', $value->counselling_id)->update([
                    'status' => Counselling::FAILED
                ]);
            }
        }
    }

    public function past($value)
    {
        return Carbon::create($value->due) < now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
}
