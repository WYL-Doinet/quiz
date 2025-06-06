<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;


class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
        
    }

    public function all()
    {
        $categories = $this->categoryService->all();

        return CategoryResource::collection($categories);
    }
}
