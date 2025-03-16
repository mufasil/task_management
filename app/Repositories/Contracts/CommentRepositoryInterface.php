<?php
namespace App\Repositories\Contracts;

interface CommentRepositoryInterface
{
    public function addComment(int $taskId, array $data);
    public function updateComment(int $commentId, array $data);
    public function deleteComment(int $commentId);
    public function listComments(int $taskId);
}