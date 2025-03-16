<?php
// Repositories
namespace App\Repositories;

use App\Models\Comment;
use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class TaskRepository implements TaskRepositoryInterface
{
    public function listTasks()
    {
        return Cache::remember('tasks', 3600, function () {
            return Task::paginate(10);
        });
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function getTask(int $id)
    {
        return Task::findOrFail($id);
    }

    public function updateTask(int $id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask(int $id)
    {
        return Task::destroy($id);
    }
}
