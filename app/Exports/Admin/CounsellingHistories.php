<?php

namespace App\Exports\Admin;

use App\Models\Counselling;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CounsellingHistories implements FromView, ShouldAutoSize
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function view(): View
    {
        return view('admin.exports.counselling.histories', [
            'counsellings' => Counselling::where('user_id', $this->user->id)->orderby('id', 'DESC')->get()
        ]);
    }
}
