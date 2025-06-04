<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class UserTest extends TestCase
{
    use RefreshDatabase, TestHelper;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_all_users_and_includes_user_data(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $response = $this->get(route('user.index'));

        $response->assertInertia(
            fn (Assert $page) => $page->component('Dashboard/User/Index')
                ->has('users.data', 1)
                ->where('users.data.0.name', $user->name)
                ->where('users.data.0.email', $user->email)
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_all_users_by_filter(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $users = User::factory()->count(5)->create()->toArray();

        $response = $this->getJson(route('user.search', ['q' => $users[0]['email']]));

        $response->assertJsonCount(1);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_created_user(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $userData = [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'email_confirmation' => 'jane@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post(route('user.store'), $userData);

        $response->assertRedirect(route('user.index'));

        $this->assertDatabaseHas('users', [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);
    }

    public function get_qr_login_code(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $response = $this->getJson(route('user.qr.login.code'));

        $response
            ->assertOk()
            ->assertJsonStructure([
                'code',
            ]);
    }
}
