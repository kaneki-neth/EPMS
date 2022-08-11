<?php

use App\Http\Controllers\AccomplishmentController;
use App\Http\Controllers\KeyFunctionController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OfficeMemberController;
use App\Http\Controllers\PerformanceMeasureController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\StratPlanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
/*
|--------------------------------------------------------------------------
| Individual API Routes
|--------------------------------------------------------------------------
|
| Route::get('/users', [UserController::class, 'index']);
| Route::post('/users', [UserController::class, 'store']);
| Route::get('/users/{id}', [UserController::class, 'show']);
| Route::put('/users/{id}', [UserController::class, 'update']);
| Route::delete('/users/{id}', [UserController::class, 'destroy']);
| Route::get('/users/search/{name}', [UserController::class, 'search']);
*/

// Route for users
Route::resource('users', UserController::class);
Route::get('/users/search/{name}', [UserController::class, 'search']);

// Route for offices
Route::resource('offices', OfficeController::class);

// Route for office-members
Route::resource('office-members', OfficeMemberController::class);
Route::get('/office_members/search/{id}', [OfficeMemberController::class, 'search']);

// Route for ratings
Route::resource('ratings', RatingController::class);

// Route for quarters
Route::resource('quarters', QuarterController::class);

// Route for accomplishments
Route::resource('accomplishments', AccomplishmentController::class);

// Route for key-funcions
Route::resource('key-functions', KeyFunctionController::class);

// Route for sectors
Route::resource('sectors', SectorController::class);

// Route for performance-measures
Route::resource('performance-measures', PerformanceMeasureController::class);

// Route for tasks
Route::resource('tasks', TaskController::class);

// Route for strat-plans
Route::resource('strat-plans', StratPlanController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Protected Routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
// });
