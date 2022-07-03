<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::post('/signup',[\App\Http\Controllers\empController::class,'signup']);

Route::post('/signup',[apiController::class,'signup']);
Route::post('/allDepartments',[apiController::class,'showDepartments']);

Route::post('/login',[apiController::class,'loginCheck']);

//tasks
Route::post('/taskView',[apiController::class,'showTasks']);
Route::post('/taskCompletion',[apiController::class,'taskCompletion']);
Route::post('/taskProgress',[apiController::class,'taskProgress']);


//leaves

Route::post('/leaveApply',[apiController::class,'leaveApply']);
Route::post('/leaveStatus',[apiController::class,'leaveViewStatus']);

//profile


Route::post('/adminProfile',[apiController::class,'adminProfile']);

Route::post('/fetchEmpProfile',[apiController::class,'fetchEmpProfile']);
Route::post('/updateEmpProfile',[apiController::class,'updateEmpProfile']);

Route::post('/fetchTeamProfile',[apiController::class,'fetchTeamProfile']);



