<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function addStaff(Request $request)
    {
        $data = $request->all();
        $user = DB::select('SELECT * FROM users WHERE  login = ?', [$data['login']])[0];

        if (!isset($data['is_foreign'])) $data['is_foreign'] = false;

        DB::insert('INSERT INTO staff(english_level_id, user_id, academic_degree_id, academic_rank_id, is_foreign) VALUES(?, ?, ?, ?, ?)',
            [$data['english_level_id'],
                $user->id,
                $data['academic_degree_id'],
                $data['academic_rank_id'],
                $data['is_foreign']]);

        return redirect()->route('panel-staff');
    }


    public function show_staff()
    {
        return view('admin-panel/show-staff', ['staff' => Staff::all()]);
    }

    public function edit_staff_page($id)
    {
        return view('admin-panel/edit-staff', ['staff' => Staff::find($id)]);
    }

    public function edit_staff(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        $data['user_id'] = DB::table('users')->select('id')->where('login', '=', $data['login'])->get()[0]->id;
        unset($data['login']);
        DB::table('staff')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('panel-staff');
    }

    public function delete_staff($id)
    {
        DB::table('staff')->delete($id);
        return redirect()->route('panel-staff');
    }
}
