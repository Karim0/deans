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
Route::post('/reset_password', 'RegController@reset_password')->name('reset_password');
Route::post('/drop_password', 'RegController@drop_password')->name('drop_password');


Route::get('admin_panel/orders', 'OrderController@Orders')->name('panel-orders');
Route::post('/add_order', 'OrderController@addOrder')->name('add_order');
Route::post('/add_order_type', 'OrderController@addOrderType')->name('add_order_type');
Route::get('/panel-order_type', 'OrderController@panelOrderType')->name('panel-order_type');
Route::post('/panel-order_type/add', 'OrderController@add_order_type')->name('add-order_type');
Route::get('/panel-order_type/edit/{id}', 'OrderController@edit_order_type_page')->name('edit-order_type_page');
Route::post('/panel-order_type/edit/{id}', 'OrderController@edit_order_type')->name('edit-order_type');
Route::get('/panel-order_type/delete/{id}', 'OrderController@delete_order_type')->name('delete-order_type');


Route::post('/add_student', 'StudentController@addStudent')->name('add_student');
Route::post('/add_study_group', 'StudentController@addStudyStatus')->name('add_study_status');
Route::post('/add_study_form', 'StudentController@addStudyForm')->name('add_study_form');
Route::post('/add_payment_forms', 'StudentController@addPaymentForms')->name('add_payment_forms');
Route::post('/add_study_lang', 'StudentController@addStudyLang')->name('add_study_lang');


Route::post('/add_group', 'GroupController@addGroup')->name('add_group');
Route::get('/panel-group', 'GroupController@show_group')->name('panel-group');
Route::get('/panel-group/edit/{id}', 'GroupController@edit_group_page')->name('edit-group_page');
Route::post('/panel-group/edit/{id}', 'GroupController@edit_group')->name('edit-group');
Route::get('/panel-group/delete/{id}', 'GroupController@delete_group')->name('delete-group');
Route::get('/group/{id}', 'GroupController@getGroup')->name('get_group');


Route::post('/add_staff', 'StaffController@addStaff')->name('add_staff');
Route::get('/panel-staff', 'StaffController@show_staff')->name('panel-staff');
Route::get('/panel-staff/edit/{id}', 'StaffController@edit_staff_page')->name('edit-staff_page');
Route::post('/panel-staff/edit/{id}', 'StaffController@edit_staff')->name('edit-staff');
Route::get('/panel-staff/delete/{id}', 'StaffController@delete_staff')->name('delete-staff');


Route::get('/panel-department', 'DepartmentController@show_departments')->name('panel-department');
Route::post('/panel-department', 'DepartmentController@add_department')->name('add-department');
Route::get('/panel-department/edit/{id}', 'DepartmentController@edit_department_page')->name('edit-department_page');
Route::post('/panel-department/edit/{id}', 'DepartmentController@edit_department')->name('edit-department');
Route::get('/panel-department/delete/{id}', 'DepartmentController@delete_department')->name('delete-department');


Route::get('/news', 'NewsController@news_page')->name('news');
