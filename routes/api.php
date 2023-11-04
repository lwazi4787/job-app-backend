<?php

use App\Http\Controllers\tasksController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\stuffController;
use App\Http\Controllers\usersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



/******* Tasks/Jobs *******/
//Route::group(['middleware' => ['auth:sanctum']], function() {
	Route::get("/tasks", [tasksController::class, 'tasks']);
	Route::get("/logout", [usersController::class, 'logout']);
//});

Route::post("/register", [usersController::class, 'register']);
Route::post("/login", [usersController::class, 'login']);
Route::post("/tasks", [tasksController::class, 'tasksByDate']);
Route::get("/tasks/total", [tasksController::class, 'getTasksAmount']);
Route::get("/tasks/total/status/{category}", [tasksController::class, 'get_tasks_amount_category']);
Route::get("/tasks/total/category/{category}", [tasksController::class, 'get_tasks_amount_department']);
Route::post("/tasks/add", [tasksController::class, 'create_task']);
Route::get("/tasks/status/{category}", [tasksController::class, 'task_category']);
Route::get("/tasks/depatment/{category}", [tasksController::class, 'task_depatment']);


Route::put("/tasks/{id}/update", [tasksController::class, 'update_task']);
Route::put("/tasks/{id}/action", [tasksController::class, 'task_action']);
Route::get("/tasks/{id}", [tasksController::class, 'individual_task']);


/******* customers *******/
Route::post("/customers/add", [customersController::class, 'addCustomer']);
Route::get("/customers", [customersController::class, 'getAllClients']);


/******* stuff *******/
Route::post("/stuff/add", [stuffController::class, 'addStuff']);
Route::get("/stuff", [stuffController::class, 'showStuff']);

//Route::get('/tasks', [tasksController::class, 'tasks']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
