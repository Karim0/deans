<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Gender;
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

        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

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

        $request->validate([
            'name' => 'required',
            'login' => 'required|string|unique:users',
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

        DB::insert('INSERT INTO users_role(user_id, role_id) VALUES(?, ?)', [$user->id, 2]);
        Log::info($user);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile');
        }

        return redirect()->route('home');
    }

    public function addUser(Request $request)
    {

        $request->validate([
            'login' => 'required|string|unique:users'
        ]);

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

        return redirect()->back();
    }

    public function change_user(Request $request)
    {
        $data = $request->all();
        DB::update('update users set name = ?, login = ?, lastname = ?, patronymic = ?, gender_id = ?,
                 tel = ?, birthdate = ?, registration_address = ?, residential_address = ?, iin = ? where id = ?',
            [$data['name'], $data['login'], $data['lastname'], $data['patronymic'], $data['gender'], $data['tel'], $data['birthdate'],
                $data['registration_address'], $data['residential_address'], $data['iin'], $data['id']]);

        return redirect()->back();
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
        $orders = StudentOrder::where('status_id', 1)->get();
        $data += ['orders' => $orders];
//        dd($data);
        return view('profile', $data);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function reset_password(Request $request)
    {
        $request->validate(['new_password' => 'required|min:6', 'new_password2' => 'required|min:6', 'password' => 'required']);
        $data = $request->all();

        $user = auth()->user();

        if ($data['new_password'] == $data['new_password2'] && Hash::check($data['password'], $user['password'])) {
            $user['password'] = Hash::make($data['new_password']);
            $user->save();
        }
        return redirect()->back();
    }

    public function drop_password(Request $request)
    {
        $data = $request->all();

        $user = User::query()->where('login', '=', $data['login'])->get()->first();
        $user['password'] = Hash::make('123456789');
        $user->save();
        if ($user == \auth()->user()) {
            return redirect()->route('logout');
        } else {
            return redirect()->back();
        }
    }

    public function user_list(Request $request)
    {
        Log::info($request);
        $columns = ['id', 'login', 'name', 'lastname', 'patronymic', 'gender_id', 'birthdate', 'registration_address', 'residential_address', 'iin'];
        $data = User::with(['gender']);

        if (isset($request['order'])) {
            if ($request['order'][0]['column'] < sizeof($columns)) {
                $data = $data->orderBy($columns[$request['order'][0]['column']], $request['order'][0]['dir']);
            }
        }

        if (isset($request['search'])) {
            foreach ($columns as $col) {
                $data = $data->orWhere($col, 'like', "%" . $request['search']['value'] . "%");
            }
        }
        $res = [];

        if (isset($request['start']) && isset($request['length'])) {
            $p = $request['start'] / $request['length'];
//            $res['page'] = [$p, $request['start'], $request['length']];
            $res["recordsFiltered"] = $data->count();
            $data = $data->paginate($request['length'], ['*'], 'page', $p + 1)->items();
            $res['data'] = $data;
        } else {
            $res['data'] = $data->get();
            $res["recordsFiltered"] = $data->count();
        }

//        $res["draw"]
        $res["recordsTotal"] = User::count();

        return $res;
    }

    public function panel_user()
    {
        return view('admin-panel.show-user');
    }

    public function panel_edit_user_page($id)
    {
        return view('admin-panel/edit-user', ['user' => User::find($id)]);
    }

    public function panel_edit_user(Request $request, $id)
    {
        $data = $request->all();
//        dd($data);
        unset($data['_token']);
        DB::table('users')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('panel-user');
    }

    public function panel_delete_user($id)
    {
        DB::table('users')->delete($id);
        return redirect()->route('panel-user');
    }

    public function add_role(Request $request)
    {
        $data = $request->all();
//        dd($data);
        unset($data['_token']);
        DB::table('users_role')->insert($data);
        return redirect()->back();
    }

    public function delete_role($role_id, $user_id)
    {
        DB::table('users_role')->where(['user_id'=>$user_id, 'role_id'=>$role_id])->delete();
        return redirect()->back();
    }
}
