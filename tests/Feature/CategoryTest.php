<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class CategoryTest extends TestCase
{
    use RefreshDatabase, TestHelper;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_returns_all_categories_and_includes_categories_data(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $categories = Category::factory()->count(5)->create()->toArray();

        $response = $this->get(route('category.index'));

        $response->assertInertia(
            fn ($page) => $page->component('Dashboard/Category/Index')
                ->has('categories.data', 5)
                ->where('categories.data.0.name', $categories[0]['name'])
                ->where('categories.data.1.name', $categories[1]['name'])
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_created_categories(): void
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $categoryData = [
            'name' => fake()->name(),
        ];

        $response = $this->post(route('category.store'), $categoryData);

        $response->assertRedirect(route('category.index'));

        $indexResponse = $this->get(route('category.index'));

        $indexResponse->assertInertia(
            fn ($page) => $page->component('Dashboard/Category/Index')
                ->has('categories.data', 1)
                ->where('categories.data.0.name', $categoryData['name'])
        );

        $this->assertDatabaseHas('categories', [
            'name' => $categoryData['name'],
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_return_category_detail()
    {
        $user = $this->createAdminUser();

        $this->actingAs($user);

        $categories = Category::factory()->count(5)->create()->toArray();

        $response = $this->get(route('category.show', ['id' => $categories[0]['id']]));

        $response->assertInertia(
            fn ($page) => $page->component('Dashboard/Category/Show')
                ->where('category.name', $categories[0]['name'])
        );
    }
}
