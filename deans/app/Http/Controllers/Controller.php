<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\StudentOrder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        if (Auth::check()) {
            $orders = StudentOrder::all()->where('user_id', '=', Auth::user()['id']);
            return view('index', ['orders' => $orders]);
        } else {
            return view('index');
        }
    }


    public function getSearchLogin(Request $request)
    {
        $data = $request->all();

        $user = DB::table('users')->select(['login', 'name', 'lastname'])->where('login', 'LIKE', $data['login'] . '%')->get();
        return response()->json(['user' => $user]);
    }
}
