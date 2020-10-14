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

Route::get('/', 'Controller@home')->name('home');
Route::get('/login', 'RegController@login_page')->name('login');
Route::post('/login', 'RegController@login')->name('post_login');
Route::get('/regist', 'RegController@registration_page')->name('register');
Route::post('/regist', 'RegController@registration')->name('post_register');
Route::get('/profile', 'RegController@profile')->name('profile');
//Route::get('/addPost', 'PostController@addPostPage')->name('add_post_page');
//Route::post('/addPost', 'PostController@addPost')->name('add_post');

