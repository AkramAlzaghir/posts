<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes for profile
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

//Routes for Post
Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::get('/posts/trashed', 'App\Http\Controllers\PostController@postTrashed')
->name('posts.trashed');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')
->name('post.create');
Route::post('/post/store', 'App\Http\Controllers\PostController@store')
->name('post.store');
Route::get('/post/show/{slug}', 'App\Http\Controllers\PostController@show')
->name('post.show');
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@edit')
->name('post.edit');
Route::post('/post/update/{id}', 'App\Http\Controllers\PostController@update')
->name('post.update');
Route::get('/post/destroy/{id}', 'App\Http\Controllers\PostController@destroy')
->name('post.destroy');
Route::get('/post/hdelete/{id}', 'App\Http\Controllers\PostController@hdelete')
->name('post.hdelete');
Route::get('/posts/restore/{id}', 'App\Http\Controllers\PostController@restore')
->name('post.restore');



//Routes for Tag
Route::get('/tags', 'App\Http\Controllers\TagController@index')->name('tags');
Route::get('/tag/create', 'App\Http\Controllers\TagController@create')
->name('tag.create');
Route::post('/tag/store', 'App\Http\Controllers\TagController@store')
->name('tag.store');
Route::get('/tag/edit/{id}', 'App\Http\Controllers\TagController@edit')
->name('tag.edit');
Route::post('/tag/update/{id}', 'App\Http\Controllers\TagController@update')
->name('tag.update');
Route::get('/tag/destroy/{id}', 'App\Http\Controllers\TagController@destroy')
->name('tag.destroy');


//Routes for Users
// Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users');
// Route::get('/user/create', 'App\Http\Controllers\UserController@create')
// ->name('user.create');
// Route::post('/user/store', 'App\Http\Controllers\UserController@store')
// ->name('user.store');
// Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')
// ->name('user.destroy');
