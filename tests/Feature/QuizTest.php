<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\QuizSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class QuizTest extends TestCase
{
    use RefreshDatabase, TestHelper;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_all_quizzes_and_includes_quizzes_data(): void
    {

        $this->seed(QuizSeeder::class);

        $user =   User::first();

        $this->actingAs($user);

        $quizzes = $this->getQuizzes(10);

        $response = $this->get(route('quiz.index'));

        $response->assertInertia(
            fn($page) =>
            $page->component('Dashboard/Quiz/Index')
                ->has('quizzes.data', 1)
                ->where('quizzes.data.0.title',  $quizzes[0]['title'])
        );

        $response->assertStatus(200);
    }


    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_quiz_detail(): void
    {
        $this->seed(QuizSeeder::class);

        $user =  User::first();

        $this->actingAs($user);

        $quiz = $this->firstQuiz();

        $response = $this->get(route('quiz.show', ['id' => $quiz['id']]));

        $response->assertInertia(
            fn($page) =>
            $page->component('Dashboard/Quiz/Show')
                ->has('quiz.questions', 10)
                ->has('quiz.questions.0.choices', 4)
                ->where('quiz.title',  $quiz['title'])
                ->where('quiz.description',  $quiz['description'])
                ->where('quiz.questions.0.question_text', $quiz['questions'][0]['question_text'])

        );

        $response->assertStatus(200);
    }
}
