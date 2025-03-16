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

class CommentController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(CommentRequest $request, int $taskId): JsonResponse
    {
        return $this->taskService->addComment($taskId, $request->validated());
    }

    public function update(CommentRequest $request, int $taskId, int $commentId): JsonResponse
    {
        return $this->taskService->updateComment($commentId, $request->validated());
    }

    public function destroy(int $taskId, int $commentId): JsonResponse
    {
        return $this->taskService->deleteComment($commentId);
    }

    public function index(int $taskId): JsonResponse
    {
        return $this->taskService->listComments($taskId);
    }
}