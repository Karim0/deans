<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUsers()
    {
        return view('index', ['users' => DB::select('SELECT * FROM users')]);
    }
}
