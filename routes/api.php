<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('tasks', [TaskController::class, 'index']);
    
    Route::middleware(['invalidate.task.cache'])->group(function () {
        Route::post('tasks', [TaskController::class, 'store']);
        Route::put('tasks/{id}', [TaskController::class, 'update']);
        Route::delete('tasks/{id}', [TaskController::class, 'destroy']);
    });

    Route::middleware(['check.task'])->group(function () {
        Route::post('tasks/{taskId}/comments', [CommentController::class, 'store']);
        Route::put('tasks/{taskId}/comments/{commentId}', [CommentController::class, 'update']);
        Route::delete('tasks/{taskId}/comments/{commentId}', [CommentController::class, 'destroy']);
        Route::get('tasks/{taskId}/comments', [CommentController::class, 'index']);
    });
});
