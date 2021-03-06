<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\DateFactory;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function addGroup(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO groups(title_kz, title_ru, title_en, dep_id, hire_date) VALUES(?, ?, ?, ?, ?)',
            [$data['title_kz'], $data['title_ru'], $data['title_en'], $data['dep_id'], Carbon::now()]);
        return redirect()->route('panel-group');
    }

    public function getGroup(Request $request, $id)
    {
        if (auth()->check()) {
            if (!auth()->user()->isAdvisor() and !auth()->user()->isAdmin()) {
                abort('403', 'У вас нет прав доступа');
            }
        }

        $group = Groups::find($id);

        return view('group_page', ['group' => $group]);
    }

    public function show_group()
    {
        return view('admin-panel/show-groups', ['groups' => Groups::all()->sortBy('id')]);
    }

    public function edit_group_page($id)
    {
        return view('admin-panel/edit-group', ['group' => Groups::find($id)]);
    }

    public function edit_group(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('groups')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('panel-group');
    }

    public function delete_group($id)
    {
        DB::table('groups')->delete($id);
        return redirect()->route('panel-group');
    }
}
