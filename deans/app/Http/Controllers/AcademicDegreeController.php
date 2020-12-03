<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegrees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicDegreeController extends Controller
{
    public function show_academic_degrees()
    {
        return view('admin-panel/show-academic_degree', ['academic_degrees' => AcademicDegrees::all()->sortBy('sort_order')]);
    }


    public function edit_academic_degree_page($id)
    {
        return view('admin-panel/edit-academic_degree', ['academic_degrees' => AcademicDegrees::find($id)]);
    }

    public function edit_academic_degree(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('academic_degrees')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-academic_degree');
    }

    public function delete_academic_degree($id)
    {
        DB::table('academic_degrees')->delete($id);
        return redirect()->route('panel-academic_degree');
    }

    public function add_academic_degree(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('academic_degrees')->insert($data);
        return redirect()->route('panel-academic_degree');
    }
}
