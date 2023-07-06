<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
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

Route::get('/admin/login', function () {
    return view('admin.page.login');
})->name('admin.login');

Route::post('admin/user/login', [UserController::class, 'login'])->name('admin.user.login');
Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.user.logout');

Route::group(['prefix' => '/', 'as' => 'front.'], function () {
    Route::get('/', [FrontController::class, 'index'])->name("index");
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/{url_key}', [\App\Http\Controllers\Front\PostController::class, 'show'])
            ->middleware(\App\Http\Middleware\RedirectPostUrl::class)
            ->name('show');
    });
    Route::group(['prefix' => 'timeline', 'as' => 'timeline.'], function () {
        Route::get('/{url_key}', [\App\Http\Controllers\Front\TimelineController::class, 'show'])
            ->middleware(\App\Http\Middleware\RedirectTimelineUrl::class)
            ->name('show');
    });
});

Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name("index");

    Route::get('/settings', [AdminController::class, 'settings'])->name("settings");
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::put('/update', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name("update");
    });

    Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
        Route::post('/upload', [\App\Http\Controllers\Admin\ImageController::class, 'upload'])->name("upload");
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/grid', [\App\Http\Controllers\Admin\PostController::class, 'grid'])
            ->name("grid");
        Route::get('/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])
            ->name("create");
        Route::post('/create', [\App\Http\Controllers\Admin\PostController::class, 'store'])
            ->name("store");
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PostController::class, 'edit'])
            ->name("edit");
        Route::put('/update/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'])
            ->name("update");

    });

    Route::group(['prefix' => 'timeline', 'as' => 'timeline.'], function () {
        Route::get('/grid', [\App\Http\Controllers\Admin\TimelineController::class, 'grid'])
            ->name("grid");
        Route::get('/create', [\App\Http\Controllers\Admin\TimelineController::class, 'create'])
            ->name("create");
        Route::post('/create', [\App\Http\Controllers\Admin\TimelineController::class, 'store'])
            ->name("store");
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TimelineController::class, 'edit'])
            ->name("edit");
        Route::put('/update/{id}', [\App\Http\Controllers\Admin\TimelineController::class, 'update'])
            ->name("update");
    });
});
