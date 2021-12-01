<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalInformationController;
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

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('test', [UserController::class, 'index'])->name('test');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('me', [AuthController::class, 'me'])->name('auth.me');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::prefix('users')->group(function() {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::post('', [UserController::class, 'store'])->name('users.store');
    
        Route::prefix('{user}')->group(function() {
            Route::get('', [UserController::class, 'show']);
            Route::post('personal-information', [PersonalInformationController::class, 'store'])
                ->name('users.personal-info.store');
            Route::delete('', [UserController::class, 'delete'])->name('user.delete');
        });
    });

    Route::prefix('courses')->group(function() {
        Route::get('', [CourseController::class, 'index'])->name('courses.index');

        Route::prefix('{course}')->group(function() {
            Route::get('', [CourseController::class, 'show'])->name('courses.show');

            Route::prefix('attendances')->group(function() {
                Route::get('', [CourseController::class, 'attendances'])->name('courses.attendances');
                Route::post('', [CourseController::class, 'createAttendance'])->name('courses.attendance.create');
            });
        });
    });

    Route::prefix('attendances')->group(function() {
        Route::prefix('{attendance}')->group(function() {
            Route::get('', [AttendanceController::class, 'show'])->name('attendances.show');
            Route::post('addUser', [AttendanceController::class, 'addUser'])->name('attendance.add-user');
        });
    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return auth()->user();
// });
