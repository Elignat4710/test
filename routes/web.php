<?php

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

Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('/popular-post', [\App\Http\Controllers\PageController::class, 'index'])->name('popular-post');
Route::get('/my-post', [\App\Http\Controllers\PageController::class, 'index'])->name('my-post');
Route::get('/show-update-post/{user_id}/{post_id}', [\App\Http\Controllers\PageController::class, 'showUpdatePost'])->name('show-update-post');
Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('show-profile');
Route::get('/show-post/{id}', [\App\Http\Controllers\PageController::class, 'show'])->name('show-post');
Route::post('/create-comment', [\App\Http\Controllers\CommentController::class, 'create'])->name('create-comment');
Route::get('/without-comment-post', [\App\Http\Controllers\PageController::class, 'index'])->name('without-comment-post');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-avatar', [\App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('update');
    Route::get('/show-create-post', [\App\Http\Controllers\PageController::class, 'showCreatePost'])->name('show-create-post');
    Route::post('/create-post', [\App\Http\Controllers\PageController::class, 'createPost'])->name('create-post');
    Route::patch('/update-post', [\App\Http\Controllers\PageController::class, 'updatePost'])->name('update-post');
});

Auth::routes(['verify' => true]);
