<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employee = Employee::with('role')->find(2);
        dd($employee->role);

        return view("employee", compact('employee'));
    }
}
