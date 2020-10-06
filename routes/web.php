<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('admin/login',[AdminController::class,'returnViewlogin'])->name('admin.login');

Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');


Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
});



