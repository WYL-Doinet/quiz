<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\QuizService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

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

    public function create()
    {
        return Inertia::render('Dashboard/User/Create');
    }


    public function show($id)
    {
        return Inertia::render('Dashboard/User/Show', [
            'user' => fn() => $this->userService->find($id)
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $password = Hash::make($request->input('password'));

        $data = [...$request->only(['name', 'email']), 'password' =>  $password];

        $this->userService->store($data);

        return redirect()->route('user.index');
    }

    public function qrLoginCode(Request $request, $id)
    {
        if ($request->wantsJson()) {
            $code =  Str::random(8);

            $this->userService->find($id)->update(['qr_login_code' => $code]);

            return response()->json(['code' =>  $code]);
        }
    }
}
