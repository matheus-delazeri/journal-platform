<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AdminController;
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
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
    });
});

Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name("index");
    Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
        Route::post('/upload', [ImageController::class, 'upload'])->name("upload");
    });
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/grid', [PostController::class, 'grid'])->name("grid");
        Route::get('/create', [PostController::class, 'create'])->name("create");
        Route::post('/create', [PostController::class, 'store'])->name("store");
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name("edit");
        Route::put('/update/{id}', [PostController::class, 'update'])->name("update");
    });
});
