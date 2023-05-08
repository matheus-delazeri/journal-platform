<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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
    return view('admin.pages.login');
})->name('admin.login');

Route::post('admin/user/login', [UserController::class, 'login'])->name('admin.user.login');
Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.user.logout');

Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    });

});

Route::get('info', function () {
    return view('info');
});
