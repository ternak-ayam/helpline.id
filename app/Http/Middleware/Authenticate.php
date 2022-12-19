<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        if($request->is('translator') || $request->is('translator/*')) {
            return route('translator.login');
        }

        if($request->is('psychologist') || $request->is('psychologist/*')) {
            return route('psychologist.login');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
