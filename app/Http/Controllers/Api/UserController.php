<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizAssignmentResource;
use App\Services\QuestionService;
use App\Services\QuizAssignmentService;
use App\Services\QuizService;
use App\Services\UserAnswerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(
        protected QuizService $quizService,
        protected QuestionService $questionService,
        protected QuizAssignmentService $quizAssignmentService,
        protected UserAnswerService $userAnswerService,

    ) {}

    public function user(Request $request)
    {
        return $request->user();
    }

    
    public function quizAssignment(Request $request)
    {
        $filters = ['user_id' => $request->user()->id];

        $assignments = $this->quizAssignmentService->findAll(filter: $filters);

        $assignments->load('quiz');

        return QuizAssignmentResource::collection($assignments);
    }


    public function quizAssignmentQuestion($id, Request $request)
    {
        $filter = [
            'user_id' => $request->user()->id,
            'id' => $id
        ];

        $assignments = $this->quizAssignmentService->findAll(filter: $filter);

        $assignments->load('quiz.questions.choices');

        return QuizAssignmentResource::collection($assignments);
    }

    public function quizAssignmentAnswer(Request $request, $id)
    {
        $filter =  [
            'user_id' => $request->user->id(),
        ];

        $assignment = $this->quizAssignmentService->find(id: $id, filter: $filter);

        if ($assignment->completed !== null) {
            return response()->json([
                'message' => 'You have already completed this quiz. Submitting answers again is not allowed.'
            ], 422);
        }

        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.choice_id' => 'nullable|exists:choices,id',
        ]);

        $answers  =  $validated['answers'];

        $receivedQuestionIds = collect($answers)
            ->pluck('question_id')
            ->sort()
            ->values();

        $questions = $this->questionService
            ->findAll(filter: ['quiz_id' => $assignment->quiz_id]);

        $questions->load('choices');

        $expectedQuestionIds =
            $questions->pluck('id')
            ->sort()
            ->values();

        if (!$receivedQuestionIds->equals($expectedQuestionIds)) {
            return response()->json([
                'message' => 'You must submit answers for all questions, even if unanswered.'
            ], 422);
        }

        $correctAnswers = $questions
            ->flatMap(fn($q) => $q->choices)
            ->where('is_correct', true)
            ->keyBy('question_id');


        $score = 0;

        $userAnswers = [];

        foreach ($answers as $answer) {
            $userAnswers[] = [
                'assignment_id' => $assignment->id,
                'question_id' => $answer['question_id'],
                'choice_id' => $answer['choice_id']
            ];

            if (
                isset($correctAnswers[$answer['question_id']]) && $correctAnswers[$answer['question_id']]->id === $answer['choice_id']
            ) {
                $score++;
            }
        }
        DB::beginTransaction();
        try {
            $this->userAnswerService->bulkStore($userAnswers);

            $assignment->update([
                'completed_at' => now(),
                'score' => $score,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            info($e->getMessage());

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
