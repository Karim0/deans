<?php

namespace App\Http\Controllers;

use App\Models\DepartmentTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentTypeController extends Controller
{
    public function show_department_types()
    {
        return view('admin-panel/show-department_type', ['department_types' => DepartmentTypes::all()->sortBy('id')]);
    }


    public function edit_department_type_page($id)
    {
        return view('admin-panel/edit-department_type', ['department_types' => DepartmentTypes::find($id)]);
    }

    public function edit_department_type(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('department_types')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-department_type');
    }

    public function delete_department_type($id)
    {
        DB::table('department_types')->delete($id);
        return redirect()->route('panel-department_type');
    }

    public function add_department_type(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('department_types')->insert($data);
        return redirect()->route('panel-department_type');
    }

}
