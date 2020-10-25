<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function addStaff(Request $request)
    {
        $data = $request->all();
        $user = DB::select('SELECT * FROM users WHERE  login = ?', [$data['login']])[0];

        DB::insert('INSERT INTO staff(english_level_id, user_id, academic_degree_id, academic_rank_id, is_foreign) VALUES(?, ?, ?, ?, ?)',
            [$data['english_level_id'],
                $user->id,
                $data['academic_degree_id'],
                $data['academic_rank_id'],
                $data['is_foreign']]);

        return redirect()->route('profile');
    }
}
