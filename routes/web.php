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

Route::get("/tasks", function(){
   return view("assignTask");
});


//employee Info Display


Route::get('/pendingEmployees',[\App\Http\Controllers\empController::class,'pendingEmpDisplay']);

Route::get('/approvedEmployees',[\App\Http\Controllers\empController::class,'approvedEmpDisplay']);
Route::get('/allEmployees',[\App\Http\Controllers\empController::class,'allEmpDisplay']);
Route::get('/rejectedEmployees',[\App\Http\Controllers\empController::class,'rejectedEmpDisplay']);

// employee  edit, delete from Pending Employee View


Route::get('/rejectEmp/{id}',[\App\Http\Controllers\empController::class,'rejectEmployee']);
Route::get('/approveEmp/{id}',[\App\Http\Controllers\empController::class,'approveEmployee']);

Route::get('/deleteEmp/{id}',[\App\Http\Controllers\empController::class,'deleteEmployee']);
