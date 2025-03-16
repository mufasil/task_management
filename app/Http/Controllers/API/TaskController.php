<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\CommentRequest;
use App\Services\AuthService;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->taskService->listTasks($request);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        return $this->taskService->createTask($request->validated());
    }

    public function show(int $id): JsonResponse
    {
        return $this->taskService->getTask($id);
    }

    public function update(TaskRequest $request, int $id): JsonResponse
    {
        return $this->taskService->updateTask($id, $request->validated());
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->taskService->deleteTask($id);
    }
}