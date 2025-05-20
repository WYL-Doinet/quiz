<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChoiceService;
use App\Services\QuestionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function __construct(protected QuestionService $questionService, protected ChoiceService $choiceService) {}

    public function update($id, Request $request)
    {
        $question = $this->questionService->find($id);
        $choices = $request->input('choices', []);
        $questionText = $request->input('question_text');

        if (!$questionText) {
            return back()->withErrors(['message' => 'Invalid Data']);
        }

        $expectedChoiceIds = $question->choices()
            ->pluck('id')
            ->toArray();

        $receivedChoiceIds = collect($choices)
            ->pluck('id')
            ->map(fn($val) => (int)$val)
            ->toArray();

        $correctAnswerCount = collect($choices)
            ->where('is_correct', true)
            ->count();

        if ($correctAnswerCount !== 1) {
            return back()->withErrors(['message' => 'There must be exactly one correct answer.']);
        }

        if (count(array_intersect($expectedChoiceIds, $receivedChoiceIds)) !==  count($expectedChoiceIds)) {
            return back()->withErrors(['message' => 'Mismatched choice IDs.']);
        }

        DB::beginTransaction();

        try {
            $question->update(['question_text' => $questionText]);

            foreach ($choices as $choice) {
                $data = [
                    'choice_text' => $choice['choice_text'],
                    'is_correct' => $choice['is_correct']
                ];
                $this->choiceService->update($choice['id'], $data);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['message' => 'An error occurred while updating.']);
        }
    }
}
