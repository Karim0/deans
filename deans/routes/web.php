<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdviserMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Localization;
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
Route::middleware([Localization::class, Authenticate::class])->group(function () {
    Route::get('/', 'Controller@home')->name('home')->withoutMiddleware([Authenticate::class]);
    Route::get('/get_search_login', 'Controller@getSearchLogin')->name('get_search_login');
    Route::get('/contacts', 'ContactController@contacts')->name('contacts')->withoutMiddleware([Authenticate::class]);
    Route::get('/news', 'NewsController@news_page')->name('news')->withoutMiddleware([Authenticate::class]);

    Route::get('/login', 'RegController@login_page')->name('login')->withoutMiddleware([Authenticate::class]);
    Route::post('/login', 'RegController@login')->name('post_login')->withoutMiddleware([Authenticate::class]);
    Route::get('/regist', 'RegController@registration_page')->name('register')->withoutMiddleware([Authenticate::class]);
    Route::post('/regist', 'RegController@registration')->name('post_register')->withoutMiddleware([Authenticate::class]);
    Route::get('/logout', 'RegController@logout')->name('logout')->withoutMiddleware([Authenticate::class]);

    Route::post('/reset_password', 'RegController@reset_password')->name('reset_password');

    Route::post('/add_order', 'OrderController@addOrder')->name('add_order');
    Route::get('/profile_student', 'RegController@profile_student')->name('profile_student');

    Route::post('/post_change_user', 'RegController@change_user')->name('post_change_user');

    Route::middleware([AdviserMiddleware::class])->group(function (){
        Route::get('/profile', 'RegController@profile')->name('profile');
        Route::post('/add_user', 'RegController@addUser')->name('add_user');

        Route::post('/drop_password', 'RegController@drop_password')->name('drop_password');

        Route::get('admin_panel/orders', 'OrderController@Orders')->name('panel-orders');

        Route::post('/add_student', 'StudentController@addStudent')->name('add_student');
        Route::post('/add_study_group', 'StudentController@addStudyStatus')->name('add_study_status');
        Route::post('/add_study_form', 'StudentController@addStudyForm')->name('add_study_form');
        Route::post('/add_payment_forms', 'StudentController@addPaymentForms')->name('add_payment_forms');
        Route::post('/add_study_lang', 'StudentController@addStudyLang')->name('add_study_lang');
        Route::get('/group/{id}', 'GroupController@getGroup')->name('get_group');
    });

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/panel-user', 'RegController@panel_user')->name('panel-user');
        Route::get('/panel-user/edit/{id}', 'RegController@panel_edit_user_page')->name('panel-edit-user_page');
        Route::post('/panel-user/edit/{id}', 'RegController@panel_edit_user')->name('panel-edit-user');
        Route::get('/panel-user/delete/{id}', 'RegController@panel_delete_user')->name('panel-delete-user');
        Route::get('/user_list', 'RegController@user_list')->name('user-list');
        Route::post('/panel-user/role/add', 'RegController@add_role')->name('panel-add_user_role');
        Route::get('/panel-user/role/delete/{role_id}/{user_id}', 'RegController@delete_role')->name('panel-delete_user_role');

        Route::get('/panel-order_type', 'OrderController@panelOrderType')->name('panel-order_type');
        Route::post('/panel-order_type/add', 'OrderController@add_order_type')->name('add-order_type');
        Route::get('/panel-order_type/edit/{id}', 'OrderController@edit_order_type_page')->name('edit-order_type_page');
        Route::post('/panel-order_type/edit/{id}', 'OrderController@edit_order_type')->name('edit-order_type');
        Route::get('/panel-order_type/delete/{id}', 'OrderController@delete_order_type')->name('delete-order_type');
        Route::post('/add_order_type', 'OrderController@addOrderType')->name('add_order_type');

        Route::post('/add_group', 'GroupController@addGroup')->name('add_group');
        Route::get('/panel-group', 'GroupController@show_group')->name('panel-group');
        Route::get('/panel-group/edit/{id}', 'GroupController@edit_group_page')->name('edit-group_page');
        Route::post('/panel-group/edit/{id}', 'GroupController@edit_group')->name('edit-group');
        Route::get('/panel-group/delete/{id}', 'GroupController@delete_group')->name('delete-group');

        Route::post('/add_staff', 'StaffController@addStaff')->name('add_staff');
        Route::get('/panel-staff', 'StaffController@show_staff')->name('panel-staff');
        Route::get('/panel-staff/edit/{id}', 'StaffController@edit_staff_page')->name('edit-staff_page');
        Route::post('/panel-staff/edit/{id}', 'StaffController@edit_staff')->name('edit-staff');
        Route::get('/panel-staff/delete/{id}', 'StaffController@delete_staff')->name('delete-staff');
        Route::post('/panel-staff/add_department_user', 'StaffController@add_department_user')->name('add_department_user');
        Route::get('/panel-staff/delete_department_user/{dep_id}/{user_id}', 'StaffController@delete_department_user')->name('delete_department_user');
        Route::post('/panel-staff/add_group_user', 'StaffController@add_group_user')->name('add_group_user');
        Route::get('/panel-staff/delete_group_user/{group_id}/{user_id}', 'StaffController@delete_group_user')->name('delete_group_user');

        Route::get('/panel-student', 'StudentController@show_student')->name('panel-student_info');
        Route::get('/panel-student/edit/{id}', 'StudentController@edit_student_page')->name('edit-student_page');
        Route::post('/panel-student/edit/{id}', 'StudentController@edit_student')->name('edit-student');
        Route::get('/panel-student/delete/{id}', 'StudentController@delete_student')->name('delete-student');

        Route::get('/panel-department', 'DepartmentController@show_departments')->name('panel-department');
        Route::post('/panel-department', 'DepartmentController@add_department')->name('add-department');
        Route::get('/panel-department/edit/{id}', 'DepartmentController@edit_department_page')->name('edit-department_page');
        Route::post('/panel-department/edit/{id}', 'DepartmentController@edit_department')->name('edit-department');
        Route::get('/panel-department/delete/{id}', 'DepartmentController@delete_department')->name('delete-department');

        Route::get('/panel-academic_degree', 'AcademicDegreeController@show_academic_degrees')->name('panel-academic_degree');
        Route::post('/panel-academic_degree', 'AcademicDegreeController@add_academic_degree')->name('add-academic_degree');
        Route::get('/panel-academic_degree/edit/{id}', 'AcademicDegreeController@edit_academic_degree_page')->name('edit-academic_degree_page');
        Route::post('/panel-academic_degree/edit/{id}', 'AcademicDegreeController@edit_academic_degree')->name('edit-academic_degree');
        Route::get('/panel-academic_degree/delete/{id}', 'AcademicDegreeController@delete_academic_degree')->name('delete-academic_degree');

        Route::get('/panel-academic_rank', 'AcademicRankController@show_academic_ranks')->name('panel-academic_rank');
        Route::post('/panel-academic_rank', 'AcademicRankController@add_academic_rank')->name('add-academic_rank');
        Route::get('/panel-academic_rank/edit/{id}', 'AcademicRankController@edit_academic_rank_page')->name('edit-academic_rank_page');
        Route::post('/panel-academic_rank/edit/{id}', 'AcademicRankController@edit_academic_rank')->name('edit-academic_rank');
        Route::get('/panel-academic_rank/delete/{id}', 'AcademicRankController@delete_academic_rank')->name('delete-academic_rank');

        Route::get('/panel-degree_type', 'DegreeTypeController@show_degree_types')->name('panel-degree_type');
        Route::post('/panel-degree_type', 'DegreeTypeController@add_degree_type')->name('add-degree_type');
        Route::get('/panel-degree_type/edit/{id}', 'DegreeTypeController@edit_degree_type_page')->name('edit-degree_type_page');
        Route::post('/panel-degree_type/edit/{id}', 'DegreeTypeController@edit_degree_type')->name('edit-degree_type');
        Route::get('/panel-degree_type/delete/{id}', 'DegreeTypeController@delete_degree_type')->name('delete-degree_type');

        Route::get('/panel-department_type', 'DepartmentTypeController@show_department_types')->name('panel-department_type');
        Route::post('/panel-department_type', 'DepartmentTypeController@add_department_type')->name('add-department_type');
        Route::get('/panel-department_type/edit/{id}', 'DepartmentTypeController@edit_department_type_page')->name('edit-department_type_page');
        Route::post('/panel-department_type/edit/{id}', 'DepartmentTypeController@edit_department_type')->name('edit-department_type');
        Route::get('/panel-department_type/delete/{id}', 'DepartmentTypeController@delete_department_type')->name('delete-department_type');

        Route::get('/panel-english_level', 'EnglishLevelController@show_english_levels')->name('panel-english_level');
        Route::post('/panel-english_level', 'EnglishLevelController@add_english_level')->name('add-english_level');
        Route::get('/panel-english_level/edit/{id}', 'EnglishLevelController@edit_english_level_page')->name('edit-english_level_page');
        Route::post('/panel-english_level/edit/{id}', 'EnglishLevelController@edit_english_level')->name('edit-english_level');
        Route::get('/panel-english_level/delete/{id}', 'EnglishLevelController@delete_english_level')->name('delete-english_level');

        Route::get('/panel-payment_form', 'PaymentFormController@show_payment_forms')->name('panel-payment_form');
        Route::post('/panel-payment_form', 'PaymentFormController@add_payment_form')->name('add-payment_form');
        Route::get('/panel-payment_form/edit/{id}', 'PaymentFormController@edit_payment_form_page')->name('edit-payment_form_page');
        Route::post('/panel-payment_form/edit/{id}', 'PaymentFormController@edit_payment_form')->name('edit-payment_form');
        Route::get('/panel-payment_form/delete/{id}', 'PaymentFormController@delete_payment_form')->name('delete-payment_form');

        Route::get('/panel-study_lang', 'StudyLangController@show_study_langs')->name('panel-study_lang');
        Route::post('/panel-study_lang', 'StudyLangController@add_study_lang')->name('add-study_lang');
        Route::get('/panel-study_lang/edit/{id}', 'StudyLangController@edit_study_lang_page')->name('edit-study_lang_page');
        Route::post('/panel-study_lang/edit/{id}', 'StudyLangController@edit_study_lang')->name('edit-study_lang');
        Route::get('/panel-study_lang/delete/{id}', 'StudyLangController@delete_study_lang')->name('delete-study_lang');

        Route::get('/panel-study_form', 'StudyFormController@show_study_forms')->name('panel-study_form');
        Route::post('/panel-study_form', 'StudyFormController@add_study_form')->name('add-study_form');
        Route::get('/panel-study_form/edit/{id}', 'StudyFormController@edit_study_form_page')->name('edit-study_form_page');
        Route::post('/panel-study_form/edit/{id}', 'StudyFormController@edit_study_form')->name('edit-study_form');
        Route::get('/panel-study_form/delete/{id}', 'StudyFormController@delete_study_form')->name('delete-study_form');

        Route::get('/panel-news', 'NewsController@panel_edit')->name('panel-news');
        Route::post('/panel-add_news', 'NewsController@panel_add_news')->name('panel-add_news');
        Route::get('/panel-delete_news/{news}', 'NewsController@destroy')->name('panel-delete_news');
        Route::get('/panel-edit_news/{news}', 'NewsController@edit')->name('panel-edit_page_news');
        Route::post('/panel-edit_news/{news}', 'NewsController@update')->name('panel-edit_news');

        Route::get('/panel-contact', 'ContactController@show_contacts')->name('panel-contact');
        Route::post('/panel-contact', 'ContactController@add_contact')->name('add-contact');
        Route::get('/panel-contact/edit/{id}', 'ContactController@edit_contact_page')->name('edit-contact_page');
        Route::post('/panel-contact/edit/{id}', 'ContactController@edit_contact')->name('edit-contact');
        Route::get('/panel-contact/delete/{id}', 'ContactController@delete_contact')->name('delete-contact');

        Route::get('/panel-study_status', 'StudyStatusController@show_study_statuses')->name('panel-study_status');
        Route::post('/panel-study_status', 'StudyStatusController@add_study_status')->name('add-study_status');
        Route::get('/panel-study_status/edit/{id}', 'StudyStatusController@edit_study_status_page')->name('edit-study_status_page');
        Route::post('/panel-study_status/edit/{id}', 'StudyStatusController@edit_study_status')->name('edit-study_status');
        Route::get('/panel-study_status/delete/{id}', 'StudyStatusController@delete_study_status')->name('delete-study_status');
    });


    Route::post('/upload_image', 'UploadFilesController@imageUpload')->name('upload_image');
    Route::post('/upload_file', 'UploadFilesController@fileUpload')->name('upload_file');


    Route::post('/change_lang', 'UploadFilesController@changeLang')->name('change-lang')->withoutMiddleware([Authenticate::class]);
});
