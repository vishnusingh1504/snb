<?php

use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// customers route
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.list');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Admin routes
Route::prefix('/admin')->middleware(['auth', 'role:Super-Admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class)->only(['index', 'store']);
    Route::get('/search', [MasterController::class, 'search_results'])->name('master.search-results');
    Route::post('/search', [MasterController::class, 'search'])->name('master.search');
    Route::prefix('/students')->resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::get('/view-profile', [UserController::class, 'view_profile'])->name('users.view-profile');
});

//for all other routes
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
