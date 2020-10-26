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
Route::get('/get_search_login', 'Controller@getSearchLogin')->name('get_search_login');


Route::get('/login', 'RegController@login_page')->name('login');
Route::post('/login', 'RegController@login')->name('post_login');
Route::get('/regist', 'RegController@registration_page')->name('register');
Route::post('/regist', 'RegController@registration')->name('post_register');
Route::get('/logout', 'RegController@logout')->name('logout');
Route::get('/profile', 'RegController@profile')->name('profile');
Route::post('/add_user', 'RegController@addUser')->name('add_user');
Route::post('/post_change_user', 'RegController@change_user')->name('post_change_user');


Route::get('admin_panel/orders', 'OrderController@Orders')->name('panel-orders');
Route::post('/add_order', 'OrderController@addOrder')->name('add_order');
Route::post('/add_order_type', 'OrderController@addOrderType')->name('add_order_type');


Route::post('/add_student', 'StudentsController@addStudent')->name('add_student');
Route::post('/add_study_group', 'StudentsController@addStudyStatus')->name('add_study_status');
Route::post('/add_study_form', 'StudentsController@addStudyForm')->name('add_study_form');
Route::post('/add_payment_forms', 'StudentsController@addPaymentForms')->name('add_payment_forms');
Route::post('/add_study_lang', 'StudentsController@addStudyLang')->name('add_study_lang');


Route::post('/add_group', 'GroupController@addGroup')->name('add_group');
Route::get('/panel-group', 'GroupController@show_group')->name('panel-group');
Route::get('/group/{id}', 'GroupController@getGroup')->name('get_group');


Route::post('/add_staff', 'StaffController@addStaff')->name('add_staff');
Route::get('/panel-staff', 'StaffController@show_staff')->name('panel-staff');



Route::get('/panel-department', 'DepartmentController@show_departments')->name('panel-department');


