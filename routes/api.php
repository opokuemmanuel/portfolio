<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your applic ation. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//////All api's on staff//////////////////////////
Route::post('/add_staff', [App\Http\Controllers\userController::class, 'Staff']);
Route::post('/update', [App\Http\Controllers\userController::class, 'update']);


/////////All api's on signup/login/////////////////////////
Route::get('/checkID', [App\Http\Controllers\accessController::class, 'checkID']);
Route::post('/SignUpUser', [App\Http\Controllers\accessController::class, 'SignUpUser']);


/////////////////////All api's on projects////////////////
Route::get('/SearchProject', [App\Http\Controllers\ProjectsController::class, 'search_project']);

