<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait UpdateTimezone {
    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'timezone' => $request->timezone,
        ]);
    }
}
