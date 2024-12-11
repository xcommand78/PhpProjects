<?php

use App\Http\Controllers\FatherController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/show',[FatherController::class,'show']);
Route::post('/show',[FatherController::class,'show']);
Route::get('index',[PersonController::class,'index']);
Route::post('/store',[FatherController::class,'store']);
Route::get('/create',[FatherController::class,'create']);
Route::get('/edit/{id}',[FatherController::class,'edit']);
Route::patch('/update/{id}',[FatherController::class,'update'])->name('update');
Route::delete('/delete/{id}',[FatherController::class,'destroy'])->name('delete');
Route::delete('/selected',[FatherController::class,'destroySelected']);