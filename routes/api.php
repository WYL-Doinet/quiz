<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'user'])->name('api.user');
    Route::get('/user/quiz-assignments', [UserController::class, 'quizAssignment'])->name('api.user.quiz.assignment');
    Route::get('/user/quiz-assignments/{id}/questions', [UserController::class, 'quizAssignmentQuestion'])->name('api.user.quiz.assignment.question');
    Route::post('/user/quiz-assignments/{id}/answers', [UserController::class, 'quizAssignmentAnswer'])->name('api.user.quiz.assignment.answer');
    Route::get('/user/quiz-assignments/{id}/results', [UserController::class, 'quizAssignmentResult'])->name('api.user.quiz.assignment.result');
    Route::get('/user/unread-notifications', [UserController::class, 'unreadNotification'])->name('api.user.unread.notification');
    Route::get('/user/read-notifications', [UserController::class, 'readNotification'])->name('api.user.read.notification');
});

Route::post('/login', [AuthController::class, 'login'])->name('api.auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
Route::post('/qr-login', [AuthController::class, 'qrLogin'])->name('api.auth.qr.login');
