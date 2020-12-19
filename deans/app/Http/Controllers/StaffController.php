<?php

namespace App\Http\Controllers;

use App\Models\DepartmentUser;
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


    public function add_department_user(Request $request)
    {
        DB::table('department_users')->insert($request->only(['user_id', 'department_id']));
        return redirect()->back();
    }

    public function delete_department_user($dep_id, $user_id)
    {
        DB::table('department_users')->where(['department_id'=>$dep_id, 'user_id'=>$user_id])->delete();
        return redirect()->back();
    }

    public function add_group_user(Request $request)
    {
        DB::table('group_users')->insert($request->only(['user_id', 'groups_id']));
        return redirect()->back();
    }

    public function delete_group_user($group_id, $user_id)
    {
        DB::table('group_users')->where(['groups_id'=>$group_id, 'user_id'=>$user_id])->delete();
        return redirect()->back();
    }
}
