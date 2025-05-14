<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}

    public function index()
    {
        return Inertia::render('Dashboard/Category/Index', [
            'categories' => fn() => $this->categoryService->findAll()
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Category/Create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255', 'unique:categories'],
            ]
        );

        $this->categoryService->store($request->only(['name']));

        return redirect()->route('category.index');
    }
}
