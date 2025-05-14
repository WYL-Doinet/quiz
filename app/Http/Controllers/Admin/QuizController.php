<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\QuestionService;
use App\Services\QuizAssignmentService;
use App\Services\QuizService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function __construct(
        protected QuizService $quizService,
        protected CategoryService $categoryService,
        protected QuestionService $questionService,
        protected QuizAssignmentService $quizAssignmentService,
    ) {}

    public function index()
    {
        return Inertia::render('Dashboard/Quiz/Index', [
            'quizzes' => function () {
                $quizzes = $this->quizService->findAll();
                $quizzes->load('createdBy');
                $quizzes->loadCount('questions');
                return $quizzes;
            },
            'categories' => function () {
                return $this->categoryService->findAll();
            }
        ]);
    }

    public function create()
    {
        $categories =  $this->categoryService->findAll();
        return Inertia::render('Dashboard/Quiz/Create', [
            'categories' => $categories
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
                    'question_text' => $question['question_text'],
                ])->choices()->createMany($question['choices']);
            }
            DB::commit();
            return redirect()->route('quiz.index');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'message' => 'Quiz creating failed'
            ]);
        }
    }

    public function createAssign($id)
    {
        return Inertia::render('Dashboard/Quiz/Assign/Create', [
            'assigns' => function () use ($id) {
                $assigns  =  $this->quizAssignmentService->findAll(['quiz_id' => $id]);
                $assigns->load('user');
                return $assigns;
            }
        ]);
    }

    public function storeAssign(Request $request, $id)
    {
        $quiz = $this->quizService->find($id);

        $userId = $request->input('user_id');

        $quizAssignment =  $this->quizAssignmentService->findFirst(filter: ['quiz_id' => $id, 'user_id' =>  $userId]);

        if ($quizAssignment) {
            return redirect()->back()->withErrors(['message' => "You're trying to assign already has an active assignment"]);
        }

        $this->quizAssignmentService->store([
            'quiz_id' => $quiz->id,
            'user_id' => $userId,
            'assigned_at' => now(),
        ]);
    }

    public function show($id)
    {
        return Inertia::render('Dashboard/Quiz/Show', [
            'quiz' => function () use ($id) {
                $quiz = $this->quizService->find($id);
                $quiz->load('questions.choices');
                return $quiz;
            }
        ]);
    }
}
