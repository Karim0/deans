<?php

namespace App\Http\Controllers;

use App\Models\StudyStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyStatusController extends Controller
{
    public function show_study_statuses()
    {
        return view('admin-panel/show-study_status', ['study_statuses' => StudyStatuses::all()->sortBy('id')]);
    }


    public function edit_study_status_page($id)
    {
        return view('admin-panel/edit-study_status', ['study_statuses' => StudyStatuses::find($id)]);
    }

    public function edit_study_status(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('study_statuses')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-study_status');
    }

    public function delete_study_status($id)
    {
        DB::table('study_statuses')->delete($id);
        return redirect()->route('panel-study_status');
    }

    public function add_study_status(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('study_statuses')->insert($data);
        return redirect()->route('panel-study_status');
    }
}
