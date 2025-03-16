<?php
namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function addComment(int $taskId, array $data)
    {
        return Comment::create(array_merge(['task_id' => $taskId, 'user_id' => auth()->user()->id], $data));
    }

    public function updateComment(int $commentId, array $data)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update($data);
        return $comment;
    }

    public function deleteComment(int $commentId)
    {
        return Comment::destroy($commentId);
    }

    public function listComments(int $taskId)
    {
        return Comment::where('task_id', $taskId)->get();
    }
}