<?php

namespace App\Http\Controllers;

use App\Models\StudentOrder;
use App\Models\StudentOrderCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO student_orders(created_at, user_id, order_cat_id, status_id) VALUES(?, ?, ?, ?)',
            [Carbon::now(), $data['user_id'], $data['order_cat_id'], '1']);

        return redirect()->route('home');
    }

    public function addOrderType(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO student_order_categories(description_kz, description_ru, description_en) VALUES(?, ?, ?)',
            [$data['description_kz'], $data['description_ru'], $data['description_en']]);

        return redirect()->route('profile');
    }

    public function panelOrderType(Request $request)
    {
        return view('admin-panel/show-order_type', ['order_type' => StudentOrderCategories::all()->sortBy('id')]);
    }

    public function Orders()
    {
        return view('admin-panel/show-order', ['orders' => StudentOrder::all()]);
    }

    public function add_order_type(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('student_order_categories')->insert($data);

        return redirect()->route('panel-order_type');
    }

    public function edit_order_type_page($id)
    {
        return view('admin-panel/edit-order_type', ['order_type' => StudentOrderCategories::find($id)]);
    }

    public function edit_order_type(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('student_order_categories')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('panel-order_type');
    }

    public function delete_order_type($id)
    {
        DB::table('student_order_categories')
            ->delete($id);
        return redirect()->route('panel-order_type');
    }
}
