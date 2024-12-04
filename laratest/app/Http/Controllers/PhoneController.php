<?php

namespace App\Http\Controllers;
use  App\Models\phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index() {
        $phone = phone::with('chipset')->find(2);
        dd($phone->chipset);
    }
}
