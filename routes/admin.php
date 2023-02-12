<?php

use App\Http\Controllers\Translator\TranslatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CityController;

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
        Route::get('/city' , [CityController::class, 'index'])->name('city.list');
        Route::post('/city/create' , [CityController::class, 'createCity'])->name('city.list.create');
        Route::post('/city/update' , [CityController::class, 'updateCity'])->name('city.list.update');
        Route::get('/city/delete/{id}' , [CityController::class, 'deleteCity'])->name('city.list.delete');
    });

    Route::prefix('counselling')->as('counselling.')->group(function () {
        Route::get('/schedule', [\App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedule.index');

        Route::get('/data', [\App\Http\Controllers\Admin\DataController::class, 'index'])->name('data.index');
        Route::get('/data/{schedule}', [\App\Http\Controllers\Admin\DataController::class, 'show'])->name('data.show');

        Route::get('/statistics', [\App\Http\Controllers\Admin\StatisticController::class, 'index'])->name('statistics.index');
        Route::get('/statistics/{user}', [\App\Http\Controllers\Admin\StatisticController::class, 'show'])->name('statistics.show');
        Route::get('/statistics/{user}/export', [\App\Http\Controllers\Admin\StatisticController::class, 'export'])->name('statistics.export');
    });

    Route::prefix('blog')->as('blog.')->group(function () {
        Route::get('/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('post.index');
        Route::get('/post/{id}/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('post.create');
        Route::get('/posts/{post}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('post.edit');
        Route::post('/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('post.store');
        Route::put('/posts/{post}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('post.update');
        Route::post('upload/posts/image', [\App\Http\Controllers\Admin\PostController::class, 'storeImage'])->name('post.storeImage');
        Route::delete('/posts/{post}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('post.destroy');
    });
});
