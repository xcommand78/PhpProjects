<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index () {
        $people = Person::with('profile')->simplePaginate(3);
        return view('index',compact('people'));
    }
}
