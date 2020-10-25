<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function addGroup(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO groups(title_kk, title_ru, title_en, dep_id) VALUES(?, ?, ?, ?)',
            [$data['title_kk'], $data['title_ru'], $data['title_en'], $data['dep_id']]);
        return redirect()->route('profile');
    }

    public function getGroup(Request $request, $id)
    {
        if (auth()->check()) {
            if (!auth()->user()->isAdvisor() and !auth()->user()->isAdmin()) {
                abort('403', 'У вас нет прав доступа');
            }
        } else {
            abort('403', 'Вы не авторизованы');
        }

        $group = Groups::find($id);

        return view('group_page', ['group' => $group]);
    }
}
