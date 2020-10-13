<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
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

Route::get('admin/login', [AdminController::class, 'returnViewlogin'])->name('admin.login');

Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resources([
        'categories' => CategoryController::class,
        'books'=> BookController::class,
        'lessons'=> LessonController::class,
        'conversations'=> ConversationController::class,
        'exercies'=> ExerciseController::class,
        'grammar'=> GrammarController::class,
        'grm_examples'=> GrammarExampleController::class,
        'histories'=> HistoryController::class,
    ]);

    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});
