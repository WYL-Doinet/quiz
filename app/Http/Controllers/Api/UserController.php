<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizAssignmentResource;
use App\Notifications\QuizAssignmentCompletedNotification;
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

        $assignments->load(['quiz' => fn($query) => $query->withCount('questions')]);

        return QuizAssignmentResource::collection($assignments);
    }


    public function quizAssignmentQuestion(Request $request, $id)
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
            'user_id' => $request->user()->id,
        ];

        $assignment = $this->quizAssignmentService->find(id: $id, filter: $filter);


        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.choice_id' => 'nullable|exists:choices,id',
        ]);

        $answers  =  $validated['answers'];

        $receivedQuestionIds = collect($answers)
            ->pluck('question_id')
            ->sort()
            ->toArray();

        $questions = $this->questionService
            ->findAll(filter: ['quiz_id' => $assignment->quiz_id]);

        $expectedQuestionIds =
            $questions->pluck('id')
            ->sort()
            ->toArray();

        if (count(array_intersect($expectedQuestionIds, $receivedQuestionIds)) !== count($receivedQuestionIds)) {
            return response()->json([
                'message' => 'Some provided question IDs do not match the expected questions.'
            ], 422);
        }

        $correctAnswers = $questions
            ->flatMap(fn($q) => $q->choices)
            ->where('is_correct', true)
            ->select(['id', 'question_id'])
            ->keyBy('question_id');


        $score = 0;

        $userAnswers = [];

        foreach ($answers as $answer) {
            $userAnswers[] = [
                'assignment_id' => $assignment->id,
                'question_id' => $answer['question_id'],
                'choice_id' => $answer['choice_id'] ?? null
            ];
            if (isset($correctAnswers[$answer['question_id']]) && $correctAnswers[$answer['question_id']]['id'] === $answer['choice_id']) {
                $score++;
            }
        }

        if ($assignment->completed !== null) {
            return response()->json([
                'message' => 'You have already completed this quiz. Your score cannot be changed.',
                'score' => $score,
            ], 409);
        }
        DB::beginTransaction();
        try {
            $this->userAnswerService->bulkStore($userAnswers);

            $completedAssignment = $assignment->update([
                'completed_at' => now(),
                'score' => $score,
            ]);

            $completedAssignment->notify(new QuizAssignmentCompletedNotification($request->user()));

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            info($e->getMessage());

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Success',
            'score' => $score,
        ]);
    }

    public function quizAssignmentResult(Request $request, $id)
    {
        $filter = ['user_id' => $request->user()->id, 'id' => $id];

        $assignment = $this->quizAssignmentService->findFirst(filter: $filter);

        if (!$assignment) {
            return response()->json(['message' => 'Not Found'], 404);
        }

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

        return new QuizAssignmentResource($assignment);
    }


    public function unreadNotification(Request $request)
    {
        $user = $request->user();

        $unread = $user->unreadNotifications()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $unread,
        ]);
    }

    public function readNotification(Request $request)
    {
        $user = $request->user();

        $read = $user->readNotifications()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $read,
        ]);
    }
}
