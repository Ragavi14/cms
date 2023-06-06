<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




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
Route::get('postPage', [App\Http\Controllers\HomeController::class, 'post'])->name('postPage');

Route::get('post', [App\Http\Controllers\PostController::class, "index"])->name('post');
Route::get("create-post", [App\Http\Controllers\PostController::class, "createPost"])->name('create-post');
Route::post('save-post', [App\Http\Controllers\PostController::class, "savePost"])->name('save-post');
Route::post('uploadFile', [App\Http\Controllers\PostController::class, "uploadFile"])->name('uploadFile');
Route::delete('destroy-post/{id}',  [App\Http\Controllers\PostController::class, 'destroy'])->name('destroy-post');