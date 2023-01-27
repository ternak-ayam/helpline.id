<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\Api\V1\User\Auth\LoginController::class, 'login'])->name('login');
Route::post('register', [\App\Http\Controllers\Api\V1\User\Auth\RegisterController::class, 'register'])->name('register');
Route::post('password/email', [\App\Http\Controllers\Api\V1\User\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [\App\Http\Controllers\Api\V1\User\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth:sanctum,counsellor,translator')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Api\V1\User\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('counsellors', [\App\Http\Controllers\Api\V1\Counsellor\User\CounsellorController::class, 'index']);
    Route::get('counsellors/{counsellor}', [\App\Http\Controllers\Api\V1\Counsellor\User\CounsellorController::class, 'show']);

    Route::post('counselling', [\App\Http\Controllers\Api\V1\Counselling\User\CounsellingController::class, 'store']);

    Route::get('profile', [\App\Http\Controllers\Api\V1\Counselling\User\ProfileController::class, 'index']);
    Route::put('profile', [\App\Http\Controllers\Api\V1\Counselling\User\ProfileController::class, 'update']);

});

Route::get('counselling/{counselling:counselling_id}', [\App\Http\Controllers\Api\V1\Counselling\User\CounsellingController::class, 'show']);

Route::get('parse/accesstoken/{accessToken}', [\App\Http\Controllers\Api\V1\AccessTokenController::class, 'parse']);

Route::post('user/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'storeUser']);
Route::put('user/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'updateUser']);

Route::post('counsellor/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'storeCounsellor']);
Route::put('counsellor/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'updateCounsellor']);

Route::post('translator/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'storeTranslator']);
Route::put('translator/call/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\CallController::class, 'updateTranslator']);

Route::post('chat/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\ChatController::class, 'store']);
Route::get('chat/{counsellingId}', [\App\Http\Controllers\Api\V1\Counselling\ChatController::class, 'show']);

Route::get('posts', [\App\Http\Controllers\Api\V1\Blog\PostController::class, 'index']);

Route::get('posts/{post}', [\App\Http\Controllers\Api\V1\Blog\PostController::class, 'show']);


Route::post('/contact/email', function (Request $request) {
    \Illuminate\Support\Facades\Mail::to('mail@support.helpline.id')->send(new \App\Mail\SendMailToContact($request));
});
