<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    public function country(){
        $countries = Country::with('states')->get();
        return view('countries', compact('countries'));
    }
}
