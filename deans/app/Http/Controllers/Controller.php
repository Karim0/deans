<?php

namespace App\Http\Controllers;

use App\Models\StudentOrder;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        if (Auth::check()) {
            $orders = StudentOrder::all()->where('user_id', '=', Auth::user()['id']);
            return view('index', ['orders' => $orders]);
        } else {
            return view('index');
        }
    }


    public function addOrder(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO student_orders(created_at, user_id, order_cat_id, status_id) VALUES(?, ?, ?, ?)',
            [Carbon::now(), $data['user_id'], $data['order_cat_id'], '1']);

        return redirect()->route('home');
    }

    public function addStudent(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'patronymic' => $data['patronymic'],
            'gender_id' => $data['gender'],
            'tel' => $data['tel'],
            'birthdate' => $data['birthdate'],
            'registration_address' => $data['registration_address'],
            'residential_address' => $data['residential_address'],
            'iin' => $data['iin'],
        ]);

        DB::insert('INSERT INTO students(study_status_id, user_id, study_form_id, payment_form_id, study_lang_id, group_id, course) VALUES(?, ?, ?, ?, ?, ?, ?)',
            [$data['study_status'], $user['id'], $data['study_form'], $data['payment_form'], $data['study_lang'], $data['group'], $data['course']]);

        return redirect()->route('profile');
    }

    public function addStuff(Request $request)
    {
//        $data = $request->all();
//
//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//            'lastname' => $data['lastname'],
//            'patronymic' => $data['patronymic'],
//            'gender_id' => $data['gender'],
//            'tel' => $data['tel'],
//            'birthdate' => $data['birthdate'],
//            'registration_address' => $data['registration_address'],
//            'residential_address' => $data['residential_address'],
//            'iin' => $data['iin'],
//        ]);
//
//        DB::insert('INSERT INTO students(study_status_id, user_id, study_form_id, payment_form_id, study_lang_id, group_id, course) VALUES(?, ?, ?, ?, ?, ?, ?)',
//            [$data['study_status'], $user['id'], $data['study_form'], $data['payment_form'], $data['study_lang'], $data['group'], $data['course']]);

        return redirect()->route('profile');
    }

    public function addGroup(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO groups(title_kk, title_ru, title_en) VALUES(?, ?, ?)',
            [$data['title_kk'], $data['title_ru'], $data['title_en']]);
        return redirect()->route('profile');
    }

    public function addStudyStatus(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_statuses(description_kz, description_ru, description_en) VALUES(?, ?, ?)',
            [$data['description_kk'], $data['description_ru'], $data['description_en']]);
        return redirect()->route('profile');
    }

    public function addStudyForm(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_forms(degree_id, department_type_id, description_kz, description_ru, description_en, course_count) VALUES(?, ?, ?, ?, ?, ?)',
            [$data['degree_id'], $data['department_type_id'], $data['description_kk'], $data['description_ru'], $data['description_en'], $data['course_count']]);
        return redirect()->route('profile');
    }

    public function addPaymentForms(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO payment_forms(description_kk, description_ru, description_en) VALUES(?, ?, ?)',
            [$data['description_kk'], $data['description_ru'], $data['description_en']]);
        return redirect()->route('profile');
    }

    public function addStudyLang(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_langs(title_kk, title_ru, title_en) VALUES(?, ?, ?)',
            [$data['title_kk'], $data['title_ru'], $data['title_en']]);
        return redirect()->route('profile');
    }
}
