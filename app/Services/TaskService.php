<?php
namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks($categoryId = null , $dueDate = null, $sortBy = 'due_date', $sortOrder = 'asc',$perPage = 15)
    {
        $user = auth()->user();
        $query = Task::where('user_id', $user->id);
        // Filter by category
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Filter by due date
        if ($dueDate) {
            $query->whereDate('due_date', $dueDate);
        }

        $query->orderBy($sortBy, $sortOrder);

        return $query->paginate($perPage);
        // return $query->get();
    }


    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function getTaskById($id)
    {
        return Task::where('id', $id)->where('user_id', auth()->id())->first();
    }
    public function updateTask($id, array $data)
    {
        $task = $this->getTaskById($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id)
    {
        $task = $this->getTaskById($id);

        if (!$task) {
            return false;
        }

        $task->delete();
        return true;
    }

}
