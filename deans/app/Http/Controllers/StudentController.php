<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function addStudent(Request $request)
    {

        $data = $request->all();
        $user = DB::select('SELECT * FROM users WHERE  login = ?', [$data['login']])[0];

        DB::insert('INSERT INTO students(study_status_id, user_id, study_form_id, payment_form_id, study_lang_id, group_id, course) VALUES(?, ?, ?, ?, ?, ?, ?)',
            [$data['study_status'], $user->id, $data['study_form'], $data['payment_form'], $data['study_lang'], $data['group'], $data['course']]);

        return redirect()->back();
    }

    public function addStudyStatus(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_statuses(description_kz, description_ru, description_en) VALUES(?, ?, ?)',
            [$data['description_kz'], $data['description_ru'], $data['description_en']]);
        return redirect()->route('profile');
    }

    public function addStudyForm(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_forms(degree_id, department_type_id, description_kz, description_ru, description_en, course_count) VALUES(?, ?, ?, ?, ?, ?)',
            [$data['degree_id'], $data['department_type_id'], $data['description_kz'], $data['description_ru'], $data['description_en'], $data['course_count']]);
        return redirect()->route('profile');
    }

    public function addStudyLang(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO study_langs(title_kz, title_ru, title_en) VALUES(?, ?, ?)',
            [$data['title_kz'], $data['title_ru'], $data['title_en']]);
        return redirect()->route('profile');
    }


    public function addPaymentForms(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO payment_forms(description_kz, description_ru, description_en) VALUES(?, ?, ?)',
            [$data['description_kz'], $data['description_ru'], $data['description_en']]);
        return redirect()->route('profile');
    }

    public function show_student()
    {
        return view('admin-panel/show-student', ['student' => Student::all()]);
    }

    public function edit_student_page($id)
    {
        return view('admin-panel/edit-student', ['student' => Student::find($id)]);
    }

    public function edit_student(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('students')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('panel-student_info');
    }

    public function delete_student($id)
    {
        DB::table('students')->delete($id);
        return redirect()->back();
    }
}
