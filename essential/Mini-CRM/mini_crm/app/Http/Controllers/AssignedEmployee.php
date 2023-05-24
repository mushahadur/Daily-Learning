<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignedEmployee extends Controller
{
    public function index()
    {
        return view('admin.employee.assign-employees.index');
    }
    public function employeeDashboard(Request $request)
    {
        return view('admin.employee.assign-employees.index');
    }
}
