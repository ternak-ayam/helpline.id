<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('login', [\App\Http\Controllers\Translator\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Translator\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [\App\Http\Controllers\Translator\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:translator')->group(function () {
    Route::prefix('counselling')->as('counselling.')->group(function () {
        Route::get('/schedule', [\App\Http\Controllers\Translator\ScheduleController::class, 'index'])->name('schedule.index');
    });
});
