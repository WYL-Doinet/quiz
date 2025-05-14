<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\QuizService;
use App\Services\UserService;
use Illuminate\Http\Request;
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
                $users->loadCount(['assigns as completed_assigns_count' => fn($query) =>  $query->whereNotNull('completed_at')]);
                return $users;
            },
            'quizzes'  => fn() => $this->quizService->findAll(),
        ]);
    }

    public function search(Request $request)
    {
        if ($request->wantsJson()) {
            $q = $request->query('q');
            return $q ? $this->userService->findAll(filter: ['q' => $q]) : [];
        }

        return [];
    }
}
