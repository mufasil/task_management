<?php
namespace App\Repositories\Contracts;

interface TaskRepositoryInterface
{
    public function listTasks();
    public function createTask(array $data);
    public function getTask(int $id);
    public function updateTask(int $id, array $data);
    public function deleteTask(int $id);
}