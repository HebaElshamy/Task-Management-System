<?php
namespace App\Traits;

trait CategoryTrait
{
    public function formatCategory($category)
    {
        return [
            'id' => $category->id,
            'name' => strtoupper($category->name),
            'description' => $category->description,
        ];
    }
}
