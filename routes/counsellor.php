<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('login', [\App\Http\Controllers\Counsellor\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Counsellor\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [\App\Http\Controllers\Counsellor\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:counsellor')->group(function () {
    Route::prefix('counselling')->as('counselling.')->group(function () {
        Route::get('/schedule', [\App\Http\Controllers\Counsellor\ScheduleController::class, 'index'])->name('schedule.index');
        Route::get('/schedule/{schedule}', [\App\Http\Controllers\Counsellor\ScheduleController::class, 'show'])->name('schedule.show');
        Route::get('/schedule/{schedule}/done', [\App\Http\Controllers\Counsellor\ScheduleController::class, 'update'])->name('schedule.update');

        Route::get('/patient/records', [\App\Http\Controllers\Counsellor\PatientRecordController::class, 'index'])->name('patient.index');
        Route::get('/patient/{counselling:counselling_id}/records', [\App\Http\Controllers\Counsellor\PatientRecordController::class, 'show'])->name('patient.show');
        Route::put('/patient/{counselling:counselling_id}/records', [\App\Http\Controllers\Counsellor\PatientRecordController::class, 'update'])->name('patient.store');

        Route::get('/statistics', [\App\Http\Controllers\Counsellor\StatisticController::class, 'index'])->name('statistics.index');
    });
});
