<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\QuizService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
        protected QuizService $quizService
    ) {}

    public function index(Request $request)
    {   
        $filter = ['q' => $request->query('q')];

        return Inertia::render('Dashboard/Category/Index', [
            'categories' => fn() => $this->categoryService->findAll(filter:$filter),

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

    public function show($id)
    {
        return Inertia::render('Dashboard/Category/Show', [
            'category' => fn() => $this->categoryService->find($id),
            'quizzes' => fn() =>  $this->quizService->findAll(filter: ['category_id' => $id])
        ]);
    }
}
