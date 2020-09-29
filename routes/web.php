<?php

use App\Http\Controllers\AdminController;
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
});

Route::get('admin/login',[AdminController::class,'returnViewlogin'])->name('admin.login');

Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');

Route::get('test-middleware',function(){
    return 'thành công';
})->middleware('admin');

