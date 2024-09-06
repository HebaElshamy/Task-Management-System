<?php
namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAllCategories()
    {
        $user = auth()->user();
        return Category::where('user_id', $user->id)->get();

    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function getCategoryById($id)
    {
        return Category::where('id', $id)->where('user_id', auth()->id())->first();
    }


    public function updateCategory($id, array $data)
    {
        $category = $this->getCategoryById($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCategoryById($id);

        if (!$category) {
            return false;
        }

        $category->delete();
        return true;
    }
}

