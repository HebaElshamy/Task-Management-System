<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Traits\CategoryTrait;
use App\Traits\ApiResponseTrait;

use Illuminate\Http\JsonResponse;


class CategoryController extends Controller
{
    use CategoryTrait;
    use ApiResponseTrait;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();
        $formattedCategories = $categories->map([$this, 'formatCategory']);
        return $this->successResponse($formattedCategories, 'Categories retrieved successfully');

    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $category = $this->categoryService->createCategory($data);

        // $category = $this->categoryService->createCategory($request->validated());
        return $this->successResponse($this->formatCategory($category), 'Category created successfully', 201);
    }

    public function show($id): JsonResponse
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return $this->errorResponse('Category not found', 404);
        }
        return $this->successResponse($this->formatCategory($category), 'Category retrieved successfully');
    }

    public function update(CategoryRequest $request, $id): JsonResponse
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            return $this->errorResponse('Category not found', 404);
        }
        $category = $this->categoryService->updateCategory($id, $request->validated());
        return $this->successResponse($this->formatCategory($category), 'Category updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {

            return $this->errorResponse('Category not found', 404);
        }
        $this->categoryService->deleteCategory($id);
        return $this->successResponse([], 'Category deleted successfully', 200);
    }

}



