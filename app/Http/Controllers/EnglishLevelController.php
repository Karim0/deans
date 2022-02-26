<?php

namespace App\Http\Controllers;

use App\Models\EnglishLevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnglishLevelController extends Controller
{
    public function show_english_levels()
    {
        return view('admin-panel/show-english_level', ['english_levels' => EnglishLevels::all()->sortBy('id')]);
    }


    public function edit_english_level_page($id)
    {
        return view('admin-panel/edit-english_level', ['english_levels' => EnglishLevels::find($id)]);
    }

    public function edit_english_level(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('english_levels')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-english_level');
    }

    public function delete_english_level($id)
    {
        DB::table('english_levels')->delete($id);
        return redirect()->route('panel-english_level');
    }

    public function add_english_level(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('english_levels')->insert($data);
        return redirect()->route('panel-english_level');
    }

}
