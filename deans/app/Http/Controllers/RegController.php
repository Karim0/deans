<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class RegController extends Controller
{
    public function login_page()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        Log::info('login ');
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Log::info('2312312312312asdas');
            return redirect('profile');
        }
        return redirect()->route('login', ['error']);
    }

    public function registration_page()
    {
        return view('register');
    }

    public function registration(Request $request)
    {
        Log::info('registration');
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();


        $isAdded = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        Log::info('$isAdded');
        return redirect("profile");
    }

    public function profile()
    {

        return redirect()->route('profile', ['error']);
    }
}
