<?php
namespace App\Services;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return ApiResponse::success(User::create($data));
    }

    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return ApiResponse::error(['message' => 'Invalid credentials'], 'Invalid credentials', 401);
        }
        return ApiResponse::success(Auth::user()->createToken('API Token')->plainTextToken);
    }
}
