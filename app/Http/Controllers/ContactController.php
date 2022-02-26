<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::all();
        return view('contacts', compact('contacts'));
    }

    public function show_contacts()
    {
        return view('admin-panel/show-contact', ['contacts' => Contact::all()->sortBy('sort_order')]);
    }


    public function edit_contact_page($id)
    {
        return view('admin-panel/edit-contact', ['contacts' => Contact::find($id)]);
    }

    public function edit_contact(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::table('contacts')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-contact');
    }

    public function delete_contact($id)
    {
        DB::table('contacts')->delete($id);
        return redirect()->route('panel-contact');
    }

    public function add_contact(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('contacts')->insert($data);
        return redirect()->route('panel-contact');
    }
}
