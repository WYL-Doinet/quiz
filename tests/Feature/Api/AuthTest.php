<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_auth_token(): void
    {
        $password = fake()->password();

        $user = User::create([
            'name' =>   fake()->name(),
            'email' => fake()->email(),
            'password' => bcrypt($password)
        ]);

        $response = $this->postJson(route('api.auth.login'), [
            'email' => $user->email,
            'password' => $password
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'user',
                'token'
            ]);

        $response->assertStatus(200);
    }
}
