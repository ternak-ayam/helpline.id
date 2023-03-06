<?php

namespace App\Console\Commands;

use App\Models\ChatAccessToken;
use App\Models\Counselling;
use App\Notifications\ReminderCounsellingNotification;
use App\Notifications\SendBookingDetailNotification;
use Google\Auth\AccessToken;
use Illuminate\Console\Command;

class CounsellingReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counselling:reminder';

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

        foreach ($counsellings as $key => $counselling) {
        
            $userToken = ChatAccessToken::where([
                ['counselling_id', $counselling->id],
                ['user_id', $counselling->user_id],
                ['owner_type', 'user']]
                )->first();

            $counsellorToken = ChatAccessToken::where([
                ['counselling_id', $counselling->id],
                ['user_id', $counselling->counsellor_id],
                ['owner_type', 'counsellor']]
                )->first();

            $translatorToken = ChatAccessToken::where([
                ['counselling_id', $counselling->id],
                ['user_id', $counselling->translator_id],
                ['owner_type', 'translator']]
                )->first();

            if($counselling->due->subHours(1)->format('Y-m-d H:i') == now('Asia/Jakarta')->format('Y-m-d H:i')) {
                $counselling->user->notify(new ReminderCounsellingNotification($counselling, $userToken->token, $counselling->user));
                
                $counselling->counsellor->notify(new ReminderCounsellingNotification($counselling, $counsellorToken->token, $counselling->counsellor));

                if ($counselling->translator_id) {
                    $counselling->translator->notify(new ReminderCounsellingNotification($counselling, $translatorToken->token, $counselling->translator));
                }
            }
        }
    }
}
