<?php

namespace Tests\Traits;

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
}
