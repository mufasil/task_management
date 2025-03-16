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

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        return $this->authService->register($request->validated());
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        return $this->authService->login($request->validated());
    }
}