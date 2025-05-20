<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\QuizAssignmentService;
use App\Services\QuizService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected QuizService $quizService,
        protected QuizAssignmentService $quizAssignmentService
    ) {}

    public function index(Request $request)
    {
        $q =  $request->query('q');
        $createdAt = $request->query('created_at');

        return Inertia::render('Dashboard/User/Index', [
            'users' =>  function ()  use ($q, $createdAt) {
                $users =  $this->userService->findAll(filter: ['q' => $q, 'created_at' => $createdAt]);
                $users->load('assigns.quiz');
                return $users;
            },
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
            'user' => fn() => $this->userService->find($id),
            'completed_assigns' => function () use ($id) {
                $assigns = $this->quizAssignmentService->findAll(filter: ['user_id', $id, 'completed_at' => true]);
                $assigns->load('quiz');
                return $assigns;
            }
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

    public function answer(Request $request)
    {
        $id = $request->route('id');
        $assignmentId = $request->route('assignment_id');
        $filter = ['user_id' => $id, 'id' => $assignmentId, 'completed_at' => true];
        $assignment = $this->quizAssignmentService->findFirst(filter: $filter);
        $assignment->load([
            'quiz' => fn($query) =>
            $query->with([
                'questions' => fn($query) => $query->addSelect(
                    [
                        'user_choice_id' => DB::table('user_answers')
                            ->select('choice_id')
                            ->where('assignment_id', $assignment->id)
                            ->whereColumn('user_answers.question_id', 'questions.id')->limit(1)
                    ]
                )
                    ->with(['choices'])
            ])
        ]);
        return $assignment;
    }
}
