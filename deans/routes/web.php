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
Route::get('/logout', 'RegController@logout')->name('logout');
Route::get('/profile', 'RegController@profile')->name('profile');
Route::post('/post_change_user', 'RegController@change_user')->name('post_change_user');
Route::post('/add_order', 'Controller@addOrder')->name('add_order');
Route::post('/add_student', 'Controller@addStudent')->name('add_student');

Route::post('/add_group', 'Controller@addGroup')->name('add_group');
Route::post('/add_study_group', 'Controller@addStudyStatus')->name('add_study_status');
Route::post('/add_study_form', 'Controller@addStudyForm')->name('add_study_form');
Route::post('/add_payment_forms', 'Controller@addPaymentForms')->name('add_payment_forms');
Route::post('/add_study_lang', 'Controller@addStudyLang')->name('add_study_lang');
Route::post('/add_staff', 'Controller@addStaff')->name('add_staff');
Route::post('/add_order_type', 'Controller@addOrderType')->name('add_order_type');
Route::post('/add_user', 'RegController@addUser')->name('add_user');

Route::get('/get_search_login', 'Controller@getSearchLogin')->name('get_search_login');


Route::get('/group/{id}', 'Controller@getGroup')->name('get_group');

//Route::get('/addPost', 'PostController@addPostPage')->name('add_post_page');
//Route::post('/addPost', 'PostController@addPost')->name('add_post');

