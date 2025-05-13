<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\QuizService;
use App\Services\UserService;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct(protected UserService $userService, protected QuizService $quizService) {}

    public function index()
    {
        return Inertia::render('Dashboard/User/Index', [
            'users' =>  function () {
                $users =  $this->userService->findAll();
                $users->load('assigns.quiz');
                return $users;
            },
            'quizzes'  => fn() => $this->quizService->findAll(),
        ]);
    }
}
