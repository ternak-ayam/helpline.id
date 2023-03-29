<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    if(((new Carbon('2023-03-28 12:40:00', 'Asia/Jakarta'))->addMinutes(15)->timestamp - now()->timestamp) < 0) {
        return "OK";
    } else {
        return "BAD";
    };
});

Route::get('{reactRoutes}', function () {
    return view('welcome');
})->where('reactRoutes', '^((?!api).)*$');

Route::get('password/reset/{token}', [\App\Http\Controllers\Api\V1\User\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
