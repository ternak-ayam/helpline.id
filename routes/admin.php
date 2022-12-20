<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::prefix('list')->as('user.')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('index');
        Route::get('/user/{user}', [UserController::class, 'show'])->name('show');

        Route::get('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'index'])->name('translator.index');
        Route::get('/translator/{translator}', [App\Http\Controllers\Translator\TranslatorController::class, 'show'])->name('translator.show');
        Route::post('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'store'])->name('translator.store');
        Route::delete('/translator/{translator}', [App\Http\Controllers\Translator\TranslatorController::class, 'destroy'])->name('translator.destroy');

        Route::get('/psychologist', [App\Http\Controllers\Counsellor\CounsellorController::class, 'index'])->name('psychologist.index');
        Route::get('/psychologist/create', [App\Http\Controllers\Counsellor\CounsellorController::class, 'create'])->name('psychologist.create');
        Route::get('/psychologist/{psychologist}', [App\Http\Controllers\Counsellor\CounsellorController::class, 'show'])->name('psychologist.show');
        Route::post('/psychologist', [App\Http\Controllers\Counsellor\CounsellorController::class, 'store'])->name('psychologist.store');
    });
});
