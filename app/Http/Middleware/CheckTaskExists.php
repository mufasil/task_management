<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Task;
use App\Helpers\ApiResponse;

class CheckTaskExists
{
    public function handle($request, Closure $next)
    {
        $taskId = $request->route('taskId'); // Get taskId from route

        if (!Task::find($taskId)) {
            return ApiResponse::error(['message' => 'Task not found'], 'Not Found', 404);
        }

        return $next($request);
    }
}
