<?php

namespace Tests\Traits;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\User;
use Spatie\Permission\Models\Role;

trait TestHelper
{
    protected function createAdminUser(): User
    {
        Role::create(['name' => 'admin']); // create role if not exists

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $user->assignRole('admin');

        return $user;
    }

    protected function createUsers(int $count)
    {
        return User::factory()->count($count)->create()->toArray();
    }

    protected function createCategories(int $count)
    {
        return Category::factory()->count($count)->create()->toArray();
    }

    protected function getQuizzes(int $count)
    {
        return Quiz::limit($count)->get()->toArray();
    }

    protected function firstQuiz()
    {
        return Quiz::with('questions.choices')->first()->toArray();
    }
}
