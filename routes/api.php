<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserTaskController;
use App\Http\Controllers\Api\UserTaskBulkController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes of authtication
Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Protected routes of product and logout
Route::scopeBindings()->middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(TaskController::class)->group(function() {
        Route::get('/tasks', 'index');
        Route::get('/tasks/{task}', 'show');
        Route::post('/tasks', 'store');
        Route::put('/tasks/{task}', 'update');
        Route::delete('/tasks/{task}', 'destroy');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users', 'index');
        Route::get('/users/{user}', 'show');
    });

    Route::controller(UserTaskController::class)->group(function() {
        Route::get('/users/{user}/tasks', 'index');
        Route::get('/users/{user}/tasks/{task}', 'show');
    });

    Route::controller(UserTaskBulkController::class)->group(function() {
        //Actions Bulk
        Route::put('/users/{user}/tasks/bulk', 'assignBulk');
        Route::delete('/users/{user}/tasks/bulk', 'unassignBulk');
    });
});
