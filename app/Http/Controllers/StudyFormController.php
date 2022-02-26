<?php

namespace App\Http\Controllers;

use App\Models\StudyForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyFormController extends Controller
{
    public function show_study_forms()
    {
        return view('admin-panel/show-study_form', ['study_forms' => StudyForms::all()->sortBy('id')]);
    }


    public function edit_study_form_page($id)
    {
        return view('admin-panel/edit-study_form', ['study_forms' => StudyForms::find($id)]);
    }

    public function edit_study_form(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('study_forms')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-study_form');
    }

    public function delete_study_form($id)
    {
        DB::table('study_forms')->delete($id);
        return redirect()->route('panel-study_form');
    }

    public function add_study_form(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('study_forms')->insert($data);
        return redirect()->route('panel-study_form');
    }
}
