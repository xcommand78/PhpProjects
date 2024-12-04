<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index() {
        $role = Role::with('employee')->find(2);
        dd($role->employee);

        return view("role", compact('role'));
    }
}
