<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\StudentOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;


class RegController extends Controller
{
    public function login_page()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        Log::info('login ');

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login', ['error']);
        }
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
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
//        dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'login' => 'required|login|unique:users',
            'password' => 'required|min:6',
        ]);
//        request()->validate([
//            'name' => 'required',
//            'login' => 'required|login|unique:users',
//            'password' => 'required|min:6',
//        ]);
        if ($validator->fails()) {
            return redirect()->route('register', ['error']);
        }
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'login' => $data['login'],
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

        return redirect()->route('home');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|login|unique:users'
        ]);
        if ($validator->fails()) {
            return redirect()->route('profile', ['error']);
        }
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'login' => $data['login'],
            'password' => Hash::make('12345678'),
            'lastname' => $data['lastname'],
            'patronymic' => $data['patronymic'],
            'gender_id' => $data['gender'],
            'tel' => $data['tel'],
            'birthdate' => $data['birthdate'],
            'registration_address' => $data['registration_address'],
            'residential_address' => $data['residential_address'],
            'iin' => $data['iin'],
        ]);

        return redirect()->route('profile');
    }

    public function change_user(Request $request)
    {
        $data = $request->all();
        DB::update('update users set name = ?, login = ?, lastname = ?, patronymic = ?, gender_id = ?,
                 tel = ?, birthdate = ?, registration_address = ?, residential_address = ?, iin = ? where id = ?',
            [$data['name'], $data['login'], $data['lastname'], $data['patronymic'], $data['gender'], $data['tel'], $data['birthdate'],
                $data['registration_address'], $data['residential_address'], $data['iin'], $data['id']]);

        return redirect()->route('profile');
    }

    public function profile()
    {
        $orders = StudentOrder::all();

        return view('profile', ['user' => Auth::user(), 'orders' => $orders]);
    }

    public function logout()
    {
//        dd(auth()->logout());
        auth()->logout();
        return redirect()->route('home');
    }
}
