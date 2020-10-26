<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show_departments()
    {
        return view('admin-panel/show-department', ['departments'=> Departments::all()]);
    }
}
