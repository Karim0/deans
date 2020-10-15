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
            return redirect()->route('profile');
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


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'patronymic' => $data['patronymic'],
            'gender' => $data['gender'],
            'tel' => $data['tel'],
            'birthdate' => $data['birthdate'],
            'registration_address' => $data['registration_address'],
            'residential_address' => $data['residential_address'],
            'iin' => $data['iin'],
        ]);
        Log::info($user);
        $credentials = $user->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile');
        }

        return redirect()->route('register', ['error']);
    }

    public function profile()
    {

        return view('profile', ['user' => Auth::user()]);
    }
}
