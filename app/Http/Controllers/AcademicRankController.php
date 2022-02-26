<?php

namespace App\Http\Controllers;

use App\Models\AcademicRank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicRankController extends Controller
{
    public function show_academic_ranks()
    {
        return view('admin-panel/show-academic_rank', ['academic_ranks' => AcademicRank::all()->sortBy('sort_order')]);
    }


    public function edit_academic_rank_page($id)
    {
        return view('admin-panel/edit-academic_rank', ['academic_ranks' => AcademicRank::find($id)]);
    }

    public function edit_academic_rank(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('academic_ranks')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-academic_rank');
    }

    public function delete_academic_rank($id)
    {
        DB::table('academic_ranks')->delete($id);
        return redirect()->route('panel-academic_rank');
    }

    public function add_academic_rank(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('academic_ranks')->insert($data);
        return redirect()->route('panel-academic_rank');
    }

}
