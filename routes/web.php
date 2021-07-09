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

// Все доступные роуты для анонимных пользователей
Route::get('/', [\App\Http\Controllers\PostController::class, 'allPosts'])->name('index');
Route::get('/popular-post', [\App\Http\Controllers\PostController::class, 'popularPosts'])->name('popular-post');
Route::get('/show-update-post/{user_id}/{post_id}', [\App\Http\Controllers\PostController::class, 'showUpdatePost'])->name('show-update-post');
Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('show-profile');
Route::get('/show-post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('show-post');
Route::post('/create-comment', [\App\Http\Controllers\CommentController::class, 'create'])->name('create-comment');
Route::get('/without-comment-post', [\App\Http\Controllers\PostController::class, 'postsWithoutComments'])->name('without-comment-post');
Route::get('/search-category', [\App\Http\Controllers\CategoryController::class, 'getCategory'])->name('search-category');
Route::get('/search-tag', [\App\Http\Controllers\TagController::class, 'getTag'])->name('search-tag');

// Роуты только для авторизированых пользователей
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-avatar', [\App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('update');
    Route::get('/show-create-post', [\App\Http\Controllers\PostController::class, 'showCreatePost'])->name('show-create-post');
    Route::post('/create-post', [\App\Http\Controllers\PostController::class, 'createPost'])->name('create-post');
    Route::patch('/update-post', [\App\Http\Controllers\PostController::class, 'updatePost'])->name('update-post');
    Route::get('/my-post', [\App\Http\Controllers\PostController::class, 'myPost'])->name('my-post');
});

Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login')->middleware('verified');
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('register', '\App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', '\App\Http\Controllers\Auth\RegisterController@register');

Route::get('password/reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', '\App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', '\App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', '\App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');
