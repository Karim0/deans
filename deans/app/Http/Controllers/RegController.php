<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\StudentOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
//        dd($data['gender']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'patronymic' => $data['patronymic'],
            'gender_id' => $data['gender'],
            'tel' => $data['tel'],
            'birthdate' => $data['birthdate'],
            'registration_address' => $data['registration_address'],
            'residential_address' => $data['residential_address'],
            'iin' => $data['iin'],
        ]);
        Log::info($user);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile');
        }

        return redirect()->route('register', ['error']);
    }

    public function change_user(Request $request)
    {
        $data = $request->all();
        DB::update('update users set name = ?, email = ?, lastname = ?, patronymic = ?, gender = ?,
                 tel = ?, birthdate = ?, registration_address = ?, residential_address = ?, iin = ? where id = ?',
            [$data['name'], $data['email'], $data['lastname'], $data['patronymic'], $data['gender'], $data['tel'], $data['birthdate'],
                $data['registration_address'], $data['residential_address'], $data['iin'], $data['id']]);

        return redirect()->route('profile');
    }

    public function profile()
    {
        $orders = StudentOrder::all();

        return view('profile', ['user' => Auth::user(), 'orders' => $orders]);
    }
}
