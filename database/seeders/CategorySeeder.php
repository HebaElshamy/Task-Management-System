<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {

        Category::create([
            'name' => 'Work',
            'description' => 'Work-related tasks',
            'user_id' => 1,
        ]);

        Category::create([
            'name' => 'Personal',
            'description' => 'Personal tasks',
            'user_id' => 1,
        ]);

        Category::create([
            'name' => 'Fitness',
            'description' => 'Fitness-related tasks',
            'user_id' => 2,
        ]);

        Category::create([
            'name' => 'Hobbies',
            'description' => 'Hobby-related tasks',
            'user_id' => 2,
        ]);
    }
}
