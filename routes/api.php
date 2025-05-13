<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'user'])->name('api.user');
    Route::get('/user/quiz-assignments', [UserController::class, 'quizAssignment'])->name('api.user.quizAssignment');
    Route::get('/user/quiz-assignments/{id}/questions', [UserController::class, 'quizAssignmentQuestion'])->name('api.user.quizAssignmentQuestion');
    Route::post('/user/quiz-assignments/{id}/answers', [UserController::class, 'quizAssignmentAnswer'])->name('api.user.quizAssignmentAnswer');
});

Route::post('/login', [AuthController::class, 'login'])->name('api.auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
