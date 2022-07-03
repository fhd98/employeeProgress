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




//employee Info Display


Route::get('/pendingEmployees',[\App\Http\Controllers\empController::class,'pendingEmpDisplay']);

Route::get('/approvedEmployees',[\App\Http\Controllers\empController::class,'approvedEmpDisplay']);
Route::get('/allEmployees',[\App\Http\Controllers\empController::class,'allEmpDisplay']);
Route::get('/rejectedEmployees',[\App\Http\Controllers\empController::class,'rejectedEmpDisplay']);

// employee  edit, delete from Pending Employee View


Route::get('/rejectEmp/{id}',[\App\Http\Controllers\empController::class,'rejectEmployee']);
Route::get('/approveEmp/{id}',[\App\Http\Controllers\empController::class,'approveEmployee']);

Route::get('/deleteEmp/{id}',[\App\Http\Controllers\empController::class,'deleteEmployee']);


//leaves
Route::get('/pending-leaves',[\App\Http\Controllers\leavesController::class,'pendingLeavesDisplay']);
Route::get('/view-leaves',[\App\Http\Controllers\leavesController::class,'leavesView']);


Route::get('/reject-leave/{id}',[\App\Http\Controllers\leavesController::class,'rejectLeave']);
Route::get('/approve-leave/{id}',[\App\Http\Controllers\leavesController::class,'approveLeave']);


//task

Route::get('/task-assign',[App\Http\Controllers\tasksController::class,'taskAssign']);
Route::post('taskPost',[\App\Http\Controllers\tasksController::class,'taskPostAction']);

Route::get('/task-view',[App\Http\Controllers\tasksController::class,'taskViewAction']);

//admin profile


Route::get('/profile-edit',[App\Http\Controllers\profileController::class,'editProfile']);
Route::post('/profilePost',[App\Http\Controllers\profileController::class,'profilePostAction']);

Route::get('/profile-view',[App\Http\Controllers\profileController::class,'viewProfile']);
Route::get('/team-profiles',[App\Http\Controllers\profileController::class,'viewTeamProfile']);



Route::get("/profile", function(){
   return view("teamView");
});



