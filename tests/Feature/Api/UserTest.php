<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Database\Seeders\QuizSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
