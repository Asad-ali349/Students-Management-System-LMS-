<?php

use App\Http\Controllers\studentApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login_api',[studentApiController::class,'login']);
Route::get('get_enrolled_courses_api/{id}',[studentApiController::class,'view_courses']);
Route::post('change_password_api',[studentApiController::class,'submit_change_password']);
Route::get('due_fee_api/{id}',[studentApiController::class,'due_fee']);
Route::get('paid_fee_api/{id}',[studentApiController::class,'paid_fee']);



