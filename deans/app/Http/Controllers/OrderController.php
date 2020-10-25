<?php

namespace App\Http\Controllers;

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
}
