<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\QuestionService;
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
        protected QuestionService $questionService
    ) {}

    public function index()
    {
        return Inertia::render('Dashboard/Quiz/Index', [
            'quizzes' => function () {
                $quizzes = $this->quizService->findAll();
                $quizzes->load('createdBy');
                $quizzes->loadCount('questions');
                return $quizzes;
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
}
