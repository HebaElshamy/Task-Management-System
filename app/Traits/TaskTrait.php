<?php
namespace App\Traits;

trait TaskTrait
{
    public function formatTask($task)
    {
        return [
            'id' => $task->id,
            'title' => strtoupper($task->title),
            'description' => $task->description,
            'due_date'=> $task->due_date,
            'status'=> $task->status,
            'priority' => $task->priority,
            'category_id'=> $task->category ? $task->category->name : null,
        ];
    }
}
