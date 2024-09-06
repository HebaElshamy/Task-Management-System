<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => 'Complete project documentation',
            'description' => 'Write and review the documentation.',
            'due_date' => '2024-09-15',
            'status' => 'pending',
            'priority' => 'medium',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Prepare for meeting',
            'description' => 'Gather materials for meeting.',
            'due_date' => '2024-09-10',
            'status' => 'in_progress',
            'priority' => 'high',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Buy groceries',
            'description' => 'Milk, bread, eggs.',
            'due_date' => '2024-09-12',
            'status' => 'pending',
            'priority' => 'low',
            'category_id' => 2,
            'user_id' => 1,
        ]);

        Task::create([
            'title' => 'Clean house',
            'description' => 'Living room, kitchen.',
            'due_date' => '2024-09-13',
            'status' => 'pending',
            'priority' => 'low',
            'category_id' => 2,
            'user_id' => 1,
        ]);


        Task::create([
            'title' => 'Go for a run',
            'description' => 'Run 5 kilometers.',
            'due_date' => '2024-09-11',
            'status' => 'completed',
            'priority' => 'medium',
            'category_id' => 3,
            'user_id' => 2,
        ]);

        Task::create([
            'title' => 'Read a book',
            'description' => 'Finish reading a novel.',
            'due_date' => '2024-09-20',
            'status' => 'in_progress',
            'priority' => 'low',
            'category_id' => 4,
            'user_id' => 2,
        ]);
    }
}
