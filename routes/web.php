<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('', [HomeController::class, 'dashboard'])->name('home.dashboard');
        Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');
        Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quiz.create');
        Route::post('/quizzes', [QuizController::class, 'store'])->name('quiz.store');

        Route::get('/users', [UserController::class, 'index'])->name('user.index');
   
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
