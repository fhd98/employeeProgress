<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('login',[\App\Http\Controllers\loginController::class,'checkIfLogin']);

Route::get('dashboard',[\App\Http\Controllers\loginController::class,'checkIfLogin']);


Route::post('dashboard',[\App\Http\Controllers\loginController::class,'postLogin']);

Route::get('/logout',[\App\Http\Controllers\loginController::class,'adminLogout']);


//employee signup

Route::get('pending', function () {
    return view('pendingEmp');
});

Route::get('approved', function () {
    return view('approvedEmp');
});

Route::get('all', function () {
    return view('allEmp');
});