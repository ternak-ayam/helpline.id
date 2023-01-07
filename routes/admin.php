<?php

use App\Http\Controllers\Translator\TranslatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::prefix('list')->as('user.')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('index');
        Route::get('/user/create', [UserController::class, 'create'])->name('create');
        Route::get('/user/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('update');
        Route::post('/user', [UserController::class, 'store'])->name('store');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('destroy');

        Route::post('import/user', [UserController::class, 'import'])->name('import');
        Route::post('import/translator', [TranslatorController::class, 'import'])->name('translator.import');

        Route::resource('/translator', App\Http\Controllers\Translator\TranslatorController::class);
        Route::resource('/psychologist', App\Http\Controllers\Counsellor\CounsellorController::class);
    });

    Route::prefix('counselling')->as('counselling.')->group(function () {
        Route::get('/schedule', [\App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedule.index');

        Route::get('/data', [\App\Http\Controllers\Admin\DataController::class, 'index'])->name('data.index');
        Route::get('/data/{schedule}', [\App\Http\Controllers\Admin\DataController::class, 'show'])->name('data.show');

        Route::get('/statistics', [\App\Http\Controllers\Admin\StatisticController::class, 'index'])->name('statistics.index');
        Route::get('/statistics/{user}', [\App\Http\Controllers\Admin\StatisticController::class, 'show'])->name('statistics.show');
        Route::get('/statistics/{user}/export', [\App\Http\Controllers\Admin\StatisticController::class, 'export'])->name('statistics.export');
    });
});
