<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::post('register', [UserController::class, 'store'])->name('user.store');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('me', [AuthController::class, 'me'])->name('auth.me');
    
    Route::prefix('users')->group(function() {
        Route::get('', [UserController::class, 'index']);
    
        Route::prefix('{user}')->group(function() {
            Route::get('', [UserController::class, 'show']);
        });
    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return auth()->user();
// });
