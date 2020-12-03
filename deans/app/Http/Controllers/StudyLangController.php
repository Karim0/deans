<?php

namespace App\Http\Controllers;

use App\Models\StudyLangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyLangController extends Controller
{
    public function show_study_langs()
    {
        return view('admin-panel/show-study_lang', ['study_langs' => StudyLangs::all()->sortBy('id')]);
    }


    public function edit_study_lang_page($id)
    {
        return view('admin-panel/edit-study_lang', ['study_langs' => StudyLangs::find($id)]);
    }

    public function edit_study_lang(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('study_langs')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-study_lang');
    }

    public function delete_study_lang($id)
    {
        DB::table('study_langs')->delete($id);
        return redirect()->route('panel-study_lang');
    }

    public function add_study_lang(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('study_langs')->insert($data);
        return redirect()->route('panel-study_lang');
    }
}
