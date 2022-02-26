<?php

namespace App\Http\Controllers;

use App\Models\DegreeTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DegreeTypeController extends Controller
{
    public function show_degree_types()
    {
        return view('admin-panel/show-degree_type', ['degree_types' => DegreeTypes::all()->sortBy('id')]);
    }


    public function edit_degree_type_page($id)
    {
        return view('admin-panel/edit-degree_type', ['degree_types' => DegreeTypes::find($id)]);
    }

    public function edit_degree_type(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('degree_types')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-degree_type');
    }

    public function delete_degree_type($id)
    {
        DB::table('degree_types')->delete($id);
        return redirect()->route('panel-degree_type');
    }

    public function add_degree_type(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('degree_types')->insert($data);
        return redirect()->route('panel-degree_type');
    }

}
