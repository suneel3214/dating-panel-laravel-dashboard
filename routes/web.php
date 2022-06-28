<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\AdminController\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/user',[App\Http\Controllers\AdminController\UserController::class,'index'])->name('admin.user');
Route::delete('/admin/users/{id}', 'App\Http\Controllers\AdminController\UserController@destroy')->name('users.destroy');
Route::get('/approve/{id}', [App\Http\Controllers\AdminController\UserController::class, 'approve'])->name('user.approve');

Route::get('/admin/user/profile',[App\Http\Controllers\AdminController\ProfileController::class,'index'])->name('admin.user.profile');
Route::get('admin/user/profile/{id}', [App\Http\Controllers\AdminController\ProfileController::class, 'show'])->name('admin.user.show');
Route::delete('/admin/user/profile/{id}',[App\Http\Controllers\AdminController\ProfileController::class, 'destroy'])->name('admin.user.profile.destory');