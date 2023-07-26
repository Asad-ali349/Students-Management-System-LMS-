<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\studentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// ---------------------------------------------------------------admin------------------------------------------------

Route::get('/admin/', [adminController::class,'index']);
Route::post('/admin/login', [adminController::class,'login']);
Route::get('/admin/forgot_password', [adminController::class,'forgot_password']);

Route::group(['middleware'=>['auth:admin']],function(){

    Route::post('/admin/logout', [adminController::class,'logout']);
    Route::get('/admin/change_password', [adminController::class,'change_password']);
    Route::post('/admin/change_password', [adminController::class,'submit_change_password']);
    Route::get('/admin/dashboard', [adminController::class,'dashboard']);
    Route::get('/admin/add_student', [adminController::class,'add_student']);
    Route::post('/admin/add_student', [adminController::class,'submit_add_student']);
    Route::get('/admin/view_students', [adminController::class,'view_students']);
    Route::get('admin/edit_student/{id}', [adminController::class,'edit_student']);
    Route::post('admin/edit_student', [adminController::class,'submit_edit_student']);
    Route::get('/admin/student_details/{id}', [adminController::class,'student_details']);
    Route::get('/admin/delete_student/{id}', [adminController::class,'delete_student']);
    Route::get('/admin/add_course', [adminController::class,'add_course']);
    Route::post('/admin/add_course', [adminController::class,'submit_add_course']);
    Route::get('/admin/view_courses', [adminController::class,'view_courses']);
    Route::get('/admin/edit_course/{id}', [adminController::class,'edit_course']);
    Route::post('/admin/edit_course/', [adminController::class,'submit_edit_course']);
    Route::get('/admin/delete_course/{id}', [adminController::class,'delete_course']);
    Route::get('/admin/due_fee', [adminController::class,'due_fee']);
    Route::get('/admin/paid_fee', [adminController::class,'paid_fee']);
    Route::get('/admin/course_enrollment', [adminController::class,'course_enrollment']);
    Route::post('/admin/course_enrollment', [adminController::class,'submit_course_enrollment']);
    Route::get('/admin/profile', [adminController::class,'profile']);
    Route::get('/admin/edit_profile', [adminController::class,'edit_profile']);
    Route::post('/admin/update_profile', [adminController::class,'update_profile']);
    Route::get('/admin/add_quiz', [adminController::class,'add_quiz']);
    Route::post('/admin/submit_add_quiz', [adminController::class,'submit_add_quiz']);
    Route::get('/admin/view_quiz', [adminController::class,'view_quiz']);
    Route::get('/admin/quiz_detail/{id}', [adminController::class,'quiz_detail']);
    Route::get('/admin/quiz_response_detail/{id}', [adminController::class,'quiz_response_detail']);
    Route::get('/admin/edit_quiz/{id}', [adminController::class,'edit_quiz']);
    Route::post('/admin/submit_edit_quiz', [adminController::class,'submit_edit_quiz']);
    Route::get('/admin/delete_quiz/{id}', [adminController::class,'delete_quiz']);
    Route::get('/admin/add_material', [adminController::class,'add_material']);
    Route::post('/admin/add_material', [adminController::class,'submit_add_material']);
    Route::get('/admin/view_materials', [adminController::class,'view_materials']);
    Route::get('/admin/edit_material', [adminController::class,'edit_material']);
    Route::get('/admin/view_course_material/{id}', [adminController::class,'view_course_material']);
    Route::get('/admin/material_detail/{id}', [adminController::class,'material_detail']);
    Route::post('/admin/update_marks', [adminController::class,'update_marks']);
    Route::post('/admin/update_marks', [adminController::class,'update_marks']);
    Route::get('/admin/delete_material/{id}', [adminController::class,'delete_material']);
    Route::get('/admin/delete_all_material/{id}', [adminController::class,'delete_all_material']);
    Route::get('/admin/material_detail/delete_material_docs/{id}', [adminController::class,'delete_material_docs']);
    Route::post('/admin/uplaod_material_docs', [adminController::class,'uplaod_material_docs']);
    Route::post('/admin/uplaod_quiz_docs', [adminController::class,'uplaod_quiz_docs']);
    Route::get('/admin/quiz_detail/delete_quiz_docs/{id}', [adminController::class,'delete_quiz_docs']);
    Route::get('/admin/update_invoice_status/{id}', [adminController::class,'update_invoice_status']);
    Route::get('/admin/cal_revenue', [adminController::class,'cal_revenue']);
    Route::get('/admin/make_fee_invoice', [adminController::class,'make_fee_invoice']);
});

// ------------------------------------------------------------------Student-------------------------------------------

Route::post('/logout', [studentController::class,'logout']);
Route::get('/', [studentController::class,'index']);
Route::post('/login', [studentController::class,'login']);

Route::group(['middleware'=>['auth:student']],function(){

    Route::get('/profile', [studentController::class,'profile']);
    Route::get('/course', [studentController::class,'view_courses']);
    Route::get('/view_course_material/{id}', [studentController::class,'view_course_material']);
    Route::get('/material_detail/{id}', [studentController::class,'material_detail']);
    Route::get('/view_quiz', [studentController::class,'view_quiz']);
    Route::get('/quiz_detail/{id}', [studentController::class,'quiz_detail']);
    Route::post('/quiz_response', [studentController::class,'submit_quiz_response']);
    Route::get('/quiz_detail/delete_response_doc/{id}', [studentController::class,'delete_response_doc']);
    Route::get('/due_fee', [studentController::class,'due_fee']);
    Route::get('/paid_fee', [studentController::class,'paid_fee']);
    Route::get('/change_password', [studentController::class,'change_password']);
    Route::post('/change_password', [studentController::class,'submit_change_password']);
});