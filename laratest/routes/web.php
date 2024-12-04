<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\email;
use App\Models\Datatypes;
use App\Models\Mark;
use App\Models\Child;
use App\Models\Country;
use App\Models\Father;   
use App\Models\Customer;
use App\Models\Product;
use App\Models\State;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function(){
    $jobs = [
        ['jobId' => 1,
            'position'=> 'WebDev',
            'salary'=> 20000,
            'Skills'=> 'Atleast 10 years of experience,Deep understanding of latest technologies like AWS,Docker,html,css,php,laravel,symphony,javascript,nodejs,react,viewjs'
        ],
        ['jobId' => 2,
        'position'=> 'Mobile devloper',
        'salary'=> 200000,
        'Skills'=> 'Java,kotlin,flutter,swift,Deep knowladge of android and ios,'],
        [
        'jobId' => 3,
        'position'=> 'GameDev',
        'salary'=> 30000,
        'Skills'=> 'Atleast 10 years of experience,Deep understanding of c++,c#,lua and latest technologies like unreal5,unity,Raytracing,Maya etc.'
        ],
        [
        'jobId' => 4,
        'position'=> 'ML Engineer',
        'salary'=> 40000,
        'Skills'=> 'Atleast 2 years of experience,Deep understanding of python,c++,tensorflow,pandas,numpy,sikitlearn,matplotib,sql,and latest technologies like navida quda,Tpu etc.'
        ]];
        # check if  the salary range in given filter
        $filterdJobs = array_filter($jobs, function($job) {
            return $job['salary'] > 20000;
        });
       
        return view('home',['jobs' => $filterdJobs]);
        
});
Route::get('/job/{jobId}',function($jobId) {
    $jobs = [
        ['jobId' => 1,
        'position'=> 'WebDev',
        'salary'=> 100000,
        'Skills'=> 'Atleast 10 years of experience,Deep understanding of latest technologies like AWS,Docker,html,css,php,laravel,symphony,javascript,nodejs,react,viewjs'
       ],
       ['jobId' => 2,
       'position'=> 'Mobile devloper',
       'salary'=> '200000',
       'Skills'=> 'Java,kotlin,flutter,swift,Deep knowladge of android and ios,'],
       [
        'jobId' => 3,
        'position'=> 'GameDev',
        'salary'=> 30000,
        'Skills'=> 'Atleast 10 years of experience,Deep understanding of c++,c#,lua and latest technologies like unreal5,unity,Raytracing,Maya etc.'
       ],
       [
        'jobId' => 4,
        'position'=> 'ML Engineer',
        'salary'=> 40000,
        'Skills'=> 'Atleast 2 years of experience,Deep understanding of python,c++,tensorflow,pandas,numpy,sikitlearn,matplotib,sql,and latest technologies like navida quda,Tpu etc.'
       ]
    ];
    #fetch data using the id
    $job = \Illuminate\Support\Arr::first($jobs,fn($job)=>$job['jobId'] == $jobId);

    return view('tutorials/jobsTutorial', ['job' => $job]);
});

Route::get('/students', function () {
    $students = Student::get();
    //dd($students );
    return view('students', compact('students'));
});

Route::get('/marks', function () {
    $marks = Mark::get();
    // dump($marks);
    dump($marks->first()->chem );
    dump($marks->first()->student->name );
    return view('students', compact('students'));
});

Route::get('/students/{id}', function ($id) {
    $student = Student::find($id);
    return view('students-show', compact('student'));
});

Route::get('/create-student', function () {

    $formData = [
        'name' => 'mukesh',
        'email' => "mukesh@gmail.com"
    ];

    Student::create($formData);
});

Route::get('/teachers', function(){
    $Teachers = Teacher::all();
    return view('teachers', compact('Teachers'));
});
Route::get('teacher-info/{id}', function($id) {
    $Teacher = Teacher::find($id);
    return view('teacher-info', compact('Teacher'));
});
Route::get('delete/{id}',function($id){
    $Teacher = Teacher::find($id);
    $Teacher->delete();
    return view('delete');
});
Route::get('/email',function(){
    $users = email::all();
    // dd($user);
    return view('email', compact('users'));

});
Route::get('user_info/{id}', function($id) {
    $user = email::find($id);
    return view('user_info', compact('usear'));
});
# relationship between modles
Route::get('father_data', function() {
    $data = 
    [
        'name'=> 'sonu',
        'age' => 22,
        'wife' => 'how am i suppose to know',
    ];
    Father::create($data);
});
Route::get('/father_childern', function() {
    $fathers = Father::with('children')->get();
    // dd($father);
    return view('father_childern', compact('fathers'));
});
Route::get('/child_info/{id}', function($id) {
    $parent_info = Father::with('children')->find($id);
    // dd($father);
    // dd($children);
    $children = $parent_info->children;
    return view('child_info', compact('children'));
});
Route::get('parent_info/{id}', function($id) {
   $child_info = Child::with('father')->find($id);
   $parent_info = $child_info->father;
   return view('parent_info', compact('parent_info','child_info'));
})->name('parent-info');
Route::get('productdetails', function() {
    $productdetails = Customer::with('products')->get();
    return view('productdetails', compact('productdetails'));
})->name('products');
Route::get('customer-details/{id}',function($id) {
    $customerdetails = Product::with('customers')->find($id);
    $customers = $customerdetails->customers;
    dd($customers);
    return view('customer-details', compact('customers'));
})->name('customer-info');
Route::get('/countries',[CountryController::class,'country']);
Route::get('/states{id}',function($id) {
    $countries = Country::with('states')->find($id);
    $states = $countries->states;
    return view('states',compact('states','countries'));

})->name('states');
Route::resource('employee',EmployeeController::class);

Route::resource('role',RoleController::class);