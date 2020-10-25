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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'login' => 'required|login|unique:users',
            'password' => 'required|min:6',
        ]);
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

        DB::insert('INSERT INTO users_role(user_id, role_id) VALUES(?, ?)', [$user->id, 12]);
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

        $data = ['user' => Auth::user()];
        if (auth()->check()) {
            if (!auth()->user()->isAdvisor() and !auth()->user()->isAdmin()) {
                abort('403', 'У вас нет прав доступа');
            }
        } else {
            abort('403', 'Вы не авторизованы');
        }
        $orders = StudentOrder::all();
        $data += ['orders' => $orders];

        if (auth()->user()->isAdmin()) {
//            dd(auth()->user()->my_groups()->allRelatedIds());
            $dep = DB::table('groups')->select('dep_id')->distinct()->whereIn('id', auth()->user()->my_groups()->allRelatedIds())->get();
            $dep_id = [];
            foreach ($dep as $d) {
//                $dep_id += $d->dep_id;
                array_push($dep_id, $d->dep_id);

            }
//            dd(DB::table('departments')->select('*')->whereIn('id', $dep_id)->get());
            $data += ['departments' => DB::table('departments')->select('*')->distinct()->whereIn('id', $dep_id)->get()];
        }
        return view('profile', $data);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
