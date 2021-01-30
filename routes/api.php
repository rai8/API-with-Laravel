<?php

use App\Http\Controllers\StudentsContoller;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//end points for Students Controller
Route::get('students', [StudentsContoller::class, 'getAllStudents']);
Route::get('students/{id}', [StudentsContoller::class, 'getStudent']);
Route::post('students', [StudentsContoller::class, 'createStudent']);
Route::put('students/{id}', [StudentsContoller::class, 'updateStudent']);
Route::delete('students/{id}', [StudentsContoller::class, 'deleteStudent']);