<?php

namespace App\Services;

use App\Helpers\ApiResponse;
use App\Repositories\TaskRepository;
use App\Repositories\CommentRepository;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskService
{
    protected TaskRepositoryInterface $taskRepo;
    protected CommentRepositoryInterface $commentRepo;

    public function __construct(TaskRepositoryInterface $taskRepo, CommentRepositoryInterface $commentRepo)
    {
        $this->taskRepo = $taskRepo;
        $this->commentRepo = $commentRepo;
    }

    public function listTasks()
    {
        return ApiResponse::success($this->taskRepo->listTasks());
    }
    public function createTask(array $data)
    {
        return ApiResponse::success($this->taskRepo->createTask($data));
    }

    public function getTask(int $id)
    {
        return ApiResponse::success($this->taskRepo->getTask($id));
    }

    public function updateTask(int $id, array $data)
    {
        return ApiResponse::success($this->taskRepo->updateTask($id, $data));
    }

    public function deleteTask(int $id)
    {
        return ApiResponse::success($this->taskRepo->deleteTask($id));
    }

    public function addComment(int $taskId, array $data)
    {
        return ApiResponse::success($this->commentRepo->addComment($taskId, $data));
    }

    public function updateComment(int $commentId, array $data)
    {
        return ApiResponse::success($this->commentRepo->updateComment($commentId, $data));
    }

    public function deleteComment(int $commentId)
    {
        return ApiResponse::success($this->commentRepo->deleteComment($commentId));
    }

    public function listComments(int $taskId)
    {
        return ApiResponse::success($this->commentRepo->listComments($taskId));
    }
}
