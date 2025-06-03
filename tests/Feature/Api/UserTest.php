<?php

namespace Tests\Feature\Api;

use App\Models\Quiz;
use App\Models\QuizAssignment;
use App\Models\User;
use App\Models\UserAnswer;
use Database\Seeders\QuizSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_current_auth_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'sanctum')->getJson('/api/user');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
            ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_all_user_quiz(): void
    {
        $this->seed(QuizSeeder::class);

        $user = User::where('email', 'user@example.com')->first();

        $response = $this->actingAs($user, 'sanctum')->getJson(route('api.user.quiz.assignment'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'score',
                        'completed_at',
                        'quiz' => [
                            'id',
                            'title',
                            'description',
                            'questions_count',
                            'category' => [
                                'id',

                            ],
                        ],
                    ],
                ],
            ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_user_assignment_questions(): void
    {
        $this->seed(QuizSeeder::class);

        $user = User::where('email', 'user@example.com')->first();

        $assign = QuizAssignment::where('user_id', $user->id)->first();

        $response = $this->actingAs($user, 'sanctum')
            ->getJson(route('api.user.quiz.assignment.question', ['id' => $assign->id]));

        $response->assertStatus(200)->assertJsonStructure(['data' => [
            '*' => [
                'id',
                'score',
                'completed_at',
                'quiz' => [
                    'id',
                    'title',
                    'description',
                    'questions' => [
                        '*' => [
                            'id',
                            'question_text',
                            'choices' => [
                                '*' => [
                                    'id',
                                    'choice_text',
                                ]
                            ]
                        ]
                    ]
                ],
            ],
        ]]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_user_score()
    {
        $this->seed(QuizSeeder::class);

        $user = User::where('email', 'user@example.com')->first();

        $assign = QuizAssignment::where('user_id', $user->id)->first();

        $quiz = Quiz::find($assign->quiz_id);

        $quiz->load('questions.choices');

        $data = [
            'answers' => []
        ];

        foreach ($quiz->questions->toArray() as $question) {
            $answer = [];

            $answer['question_id'] = $question['id'];

            $random = Arr::random($question['choices']);

            $answer['choice_id'] = $random['id'];

            $data['answers'][]  = $answer;
        }

        $response = $this->actingAs($user, 'sanctum')
            ->postJson(route('api.user.quiz.assignment.answer', ['id' => $assign->id]), $data);

        $response->assertOk()->assertJsonStructure(['message', 'score']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_user_result()
    {

        $this->seed(QuizSeeder::class);

        $user = User::where('email', 'user@example.com')->first();

        $assign = QuizAssignment::where('user_id', $user->id)->first();

        $response = $this->actingAs($user, 'sanctum')
            ->getJson(route('api.user.quiz.assignment.result', ['id' => $assign->id]));

        $quiz = Quiz::find($assign->quiz_id);

        $quiz->load('questions.choices');

        $data = [];

        foreach ($quiz->questions->toArray() as $question) {
            $answer = [];

            $answer['question_id'] = $question['id'];

            $random = Arr::random($question['choices']);

            $answer['choice_id'] = $random['id'];
            $answer['assignment_id'] = $assign->id;

            $data[]  = $answer;
        }
        UserAnswer::insert($answer);

        $response->assertOk()->assertJsonStructure(['data' => [
            'id',
            'score',
            'completed_at',
            'quiz' => [
                'id',
                'title',
                'description',
                'questions' => [
                    '*' => [
                        'id',
                        'question_text',
                        'choices' => [
                            '*' => [
                                'id',
                                'choice_text',
                            ]
                        ]
                    ]
                ]
            ],
        ]]);;
    }
}
