<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ResultsExport;
use App\Http\Controllers\Controller;
use App\Notifications\QuizAssignedNotification;
use App\Services\CategoryService;
use App\Services\QuestionService;
use App\Services\QuizAssignmentService;
use App\Services\QuizService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class QuizController extends Controller
{
    public function __construct(
        protected QuizService $quizService,
        protected CategoryService $categoryService,
        protected QuestionService $questionService,
        protected QuizAssignmentService $quizAssignmentService,
        protected UserService $userService,
    ) {}

    public function index(Request $request)
    {
        $filter = [
            'title' => $request->query('title'),
            'category_id' => $request->query('category_id'),
        ];

        return Inertia::render('Dashboard/Quiz/Index', [
            'quizzes' => function () use ($filter) {
                $quizzes = $this->quizService->findAll(filter: $filter);
                $quizzes->load('createdBy');
                $quizzes->loadCount('questions');

                return $quizzes;
            },
            'categories' => function () {
                return $this->categoryService->all();
            },
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Quiz/Create', [
            'categories' => $this->categoryService->all(),
        ]);
    }

    public function store(Request $request)
    {
        $newQuiz = $request->only(['category_id', 'description', 'title']);
        $questions = $request->input('questions');
        DB::beginTransaction();
        try {
            $quiz = $this->quizService->store([...$newQuiz, 'created_by' => $request->user()->id]);
            foreach ($questions as $question) {
                $this->questionService->store([
                    'quiz_id' => $quiz->id,
                    'explanation' => $question['explanation'] ?? null,
                    'question_text' => $question['question_text'],
                ])->choices()->createMany($question['choices']);
            }
            DB::commit();

            return redirect()->route('quiz.index');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'message' => 'Quiz creating failed',
            ]);
        }
    }

    public function createAssign($id)
    {
        return Inertia::render('Dashboard/Quiz/Assign/Create', [
            'assigns' => function () use ($id) {
                $assigns = $this->quizAssignmentService->findAll(['quiz_id' => $id]);
                $assigns->load('user.notifications');

                return $assigns;
            },
        ]);
    }

    public function storeAssign(Request $request, $id)
    {
        $quiz = $this->quizService->find($id);

        $userId = $request->input('user_id');

        $user = $this->userService->find($userId);

        $quizAssignment = $this->quizAssignmentService->findFirst(filter: ['quiz_id' => $user->id, 'user_id' => $userId]);

        if ($quizAssignment) {
            return redirect()->back()->withErrors(['message' => "You're trying to assign already has an active assignment"]);
        }

        $quizAssignment = $this->quizAssignmentService->store([
            'quiz_id' => $quiz->id,
            'user_id' => $userId,
            'assigned_at' => now(),
        ]);

        $user->notify(new QuizAssignedNotification($quiz));
    }

    public function show($id)
    {
        return Inertia::render('Dashboard/Quiz/Show', [
            'quiz' => function () use ($id) {
                $quiz = $this->quizService->find($id);
                $quiz->load('questions.choices');

                return $quiz;
            },
        ]);
    }

    public function demo($id)
    {
        return Inertia::render('Dashboard/Quiz/Demo', [
            'quiz' => function () use ($id) {
                $quiz = $this->quizService->find($id);
                $quiz->load('questions.choices');

                return $quiz;
            },
        ]);
    }

    public function exportResult($id)
    {
        return Excel::download(new ResultsExport($id), 'result-'.now()->format('Y-m-d').'-'.$id.'.xlsx');
    }
}
