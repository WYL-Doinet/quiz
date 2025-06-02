<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  redirect()->route('home.dashboard');
});
Route::get('/app',  [AppController::class, 'index'])->name('app.index');
Route::get('/app/download',  [AppController::class, 'download'])->name('app.download');

Route::middleware('guest')->group(function () {

    Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('', [HomeController::class, 'dashboard'])->name('home.dashboard');

        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');

        Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');
        Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quiz.create');
        Route::post('/quizzes', [QuizController::class, 'store'])->name('quiz.store');
        Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quiz.show');
        Route::get('/quizzes/{id}/demo', [QuizController::class, 'demo'])->name('quiz.demo');
        Route::get('/quizzes/{id}/assigns/create', [QuizController::class, 'createAssign'])->name('quiz.assign.create');
        Route::post('/quizzes/{id}/assigns', [QuizController::class, 'storeAssign'])->name('quiz.assign.store');
        Route::get('/quizzes/{id}/export-result', [QuizController::class, 'exportResult'])->name('quiz.export.result');

        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::get('/users/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/user/{id}/qr-login-code', [UserController::class, 'qrLoginCode'])->name('user.qr.login.code');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/users/{id}/assigns/{assignment_id}/answers', [UserController::class, 'answer'])->name('user.answer');



        Route::patch('/questions/{id}', [QuestionController::class, 'update'])->name('question.update');


        Route::get('/notifications', [NotificationController::class, 'index'])->name('notification.index');
        Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notification.show');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
