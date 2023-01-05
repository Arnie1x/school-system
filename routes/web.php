<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentActivityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RegisteredUnitsController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UnitActivityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\Administrator;
use App\Models\Department;
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

// Main Routes
Route::get('/', [Controller::class, 'index'])->middleware('auth');
/** */

Route::get('/student', [UnitController::class, 'student']);
Route::get('/lecturer', [UnitController::class, 'lecturer']);
Route::get('/staff', [DepartmentController::class, 'index']);

// Authentication Routes

Route::get('/login',[ function() {
    return view('authentication/login');
}])->name('login');

Route::get('/register', [UserController::class, 'create']);

Route::get('/register/student', [StudentController::class, 'create']);

Route::get('/register/lecturer', [LecturerController::class, 'create']);

Route::get('/register/staff', [StaffController::class, 'create']);

Route::post('/register/student', [StudentController::class, 'store']);

Route::post('/register/lecturer', [LecturerController::class, 'store']);

Route::post('/register/staff', [StaffController::class, 'store']);

Route::get('/registered', function() {
    return view('authentication/registered');
})->middleware('auth');

Route::post('/users', [UserController::class, 'store'])->middleware('auth');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::put('/account', [UserController::class, 'update'])->middleware('auth');

Route::get('/account', [UserController::class, 'account'])->middleware('auth');

// Unit Routes + Unit Activity Routes
Route::post('/units/create', [UnitController::class, 'store'])->middleware('auth');

Route::get('/units/create', [UnitController::class, 'create'])->middleware('auth');

Route::get('/units/register', [RegisteredUnitsController::class, 'index'])->middleware('auth');

Route::get('/units/register/{id}', [RegisteredUnitsController::class, 'register'])->middleware('auth');

Route::put('/units/manage', [UnitController::class, 'update'])->middleware('auth');

Route::get('/units/manage', [UnitController::class, 'manage'])->middleware('auth');


Route::get('/units/{id}', [UnitController::class, 'show'])->middleware('auth');

Route::get('/units/{id}/create', [UnitActivityController::class, 'create'])->middleware('auth');

Route::post('/units/{id}/create', [UnitActivityController::class, 'store'])->middleware('auth');

Route::get('/units/{id}/delete', [UnitController::class, 'delete'])->middleware('auth');

Route::get('/units/{id}/{activity_id}', [UnitActivityController::class, 'showFromUnit'])->middleware('auth');

Route::get('/units/{id}/{activity_id}/delete', [UnitActivityController::class, 'delete'])->middleware('auth');


// Course Routes
Route::post('/courses/create', [CourseController::class, 'store'])->middleware('auth');

Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');

// School Routes
Route::post('/schools/create', [SchoolController::class, 'store'])->middleware('auth');

Route::get('/schools/create', [SchoolController::class, 'create'])->middleware('auth');

//Department Routes + Department Activity Routes

Route::post('/departments/create', [DepartmentController::class, 'store'])->middleware('auth');

Route::get('/departments/create', [DepartmentController::class, 'create'])->middleware('auth');

Route::get('/departments/{id}', [DepartmentController::class, 'show'])->middleware('auth');

Route::get('/departments/{id}/create', [DepartmentActivityController::class, 'create'])->middleware('auth');

Route::post('/departments/{id}/create', [DepartmentActivityController::class, 'store'])->middleware('auth');

Route::get('/departments/{id}/delete', [DepartmentController::class, 'delete'])->middleware('auth');

Route::get('/departments/{id}/{activity_id}/delete', [DepartmentActivityController::class, 'delete'])->middleware('auth');

// Admin Routes

Route::post('/admin/create', [AdministratorController::class, 'store'])->middleware('auth');

Route::get('/admin/create', [AdministratorController::class, 'create'])->middleware('auth');

Route::get('/admin', [AdministratorController::class, 'index'])->middleware('auth');

// Application Routes
Route::get('/applications/student', [ApplicationController::class, 'student'])->middleware('auth');

Route::get('/applications/lecturer', [ApplicationController::class, 'lecturer'])->middleware('auth');

Route::get('/applications/staff', [ApplicationController::class, 'staff'])->middleware('auth');

Route::get('/applications/{id}/accept', [ApplicationController::class, 'accept'])->middleware('auth');

Route::get('/applications/{id}/reject', [ApplicationController::class, 'reject'])->middleware('auth');