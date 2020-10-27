<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class DepartmentController extends Controller
{
    public function show_departments()
    {
        return view('admin-panel/show-department', ['departments' => Departments::all()->sortBy('id')]);
    }


    public function edit_department_page ($id)
    {
        return view('admin-panel/edit-department', ['dep' => Departments::find($id)]);
    }

    public function edit_department(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($data['parent_id'] == 'null') unset($data['parent_id']);
        DB::table('departments')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-department');
    }

    public function delete_department($id)
    {
        DB::table('departments')->delete($id);
        return redirect()->route('panel-department');
    }

    public function add_department(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($data['parent_id'] == 'null') unset($data['parent_id']);
        DB::table('departments')->insert($data);
        return redirect()->route('panel-department');
    }
}
