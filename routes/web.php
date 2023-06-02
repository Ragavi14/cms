<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogPostController;



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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/page', [App\Http\Controllers\PagesController::class, 'index'])->name('page');
Route::post('/submitform',[App\Http\Controllers\PagesController::class,'submitform'])->name('submitform');
Route::post('/uploadFile',[App\Http\Controllers\PagesController::class,'uploadFile'])->name('uploadFile');

Route::resource('posts', BlogPostController::class);