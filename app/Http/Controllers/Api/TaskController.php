<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use App\Traits\TaskTrait;
use App\Traits\ApiResponseTrait;

use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    //
    use TaskTrait;
    use ApiResponseTrait;

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request): JsonResponse
    {

        $categoryId = $request->query('category');
        $dueDate = $request->query('due_date');
        $sortBy = $request->input('sort_by', 'due_date');
        $sortOrder = $request->input('sort_order', 'asc');
        $perPage = $request->input('per_page', 15);

        // Fetch tasks based on filters
        $tasks = $this->taskService->getAllTasks(
            $categoryId,
            $dueDate,
            $sortBy,
            $sortOrder,
            $perPage
        );
        // Format the tasks
        $formattedTasks = $tasks->map([$this, 'formatTask']);

        // return $this->successResponse($formattedTasks, 'Tasks retrieved successfully');
        return $this->successResponse($formattedTasks, 'Tasks retrieved successfully', 200, [
            'pagination' => [
                'current_page' => $tasks->currentPage(),
                'total_pages' => $tasks->lastPage(),
                'total_items' => $tasks->total(),
                'items_per_page' => $tasks->perPage(),
            ]
        ]);

    }

    public function store(TaskRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $task = $this->taskService->createTask($data);
        return $this->successResponse($this->formatTask($task), 'Task created successfully', 201);
    }

    public function show($id): JsonResponse
    {
        $task = $this->taskService->getTaskById($id);
        if (!$task) {
            return $this->errorResponse('Task not found', 404);
        }
        return $this->successResponse($this->formatTask($task), 'Task retrieved successfully');
    }

    public function update(TaskRequest $request, $id): JsonResponse
    {
        $task = $this->taskService->getTaskById($id);

        if (!$task) {
            return $this->errorResponse('Task not found', 404);
        }
        $Task = $this->taskService->updateTask($id, $request->validated());
        return $this->successResponse($this->formatTask($task), 'Task updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $task = $this->taskService->getTaskById($id);
        if (!$task) {

            return $this->errorResponse('Task not found', 404);
        }
        $this->taskService->deleteTask($id);
        return $this->successResponse([], 'Task deleted successfully', 200);
    }
}
