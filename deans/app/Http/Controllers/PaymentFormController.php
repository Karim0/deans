<?php

namespace App\Http\Controllers;

use App\Models\PaymentForms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentFormController extends Controller
{
    public function show_payment_forms()
    {
        return view('admin-panel/show-payment_form', ['payment_forms' => PaymentForms::all()->sortBy('id')]);
    }


    public function edit_payment_form_page($id)
    {
        return view('admin-panel/edit-payment_form', ['payment_forms' => PaymentForms::find($id)]);
    }

    public function edit_payment_form(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('payment_forms')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-payment_form');
    }

    public function delete_payment_form($id)
    {
        DB::table('payment_forms')->delete($id);
        return redirect()->route('panel-payment_form');
    }

    public function add_payment_form(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('payment_forms')->insert($data);
        return redirect()->route('panel-payment_form');
    }

}
