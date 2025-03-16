<?php
namespace App\Helpers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;


class ApiResponse
{
    public static function success($data = [], $message = 'Success')
    {
        return response()->json([
            'status' => true,
            "message" => $message,
            'data' => $data,
            'errors' => []
        ], 200);
    }

    public static function error($errors = [], $message = 'Error', $statusCode = 400)
    {
        return response()->json([
            'status' => false,
            "message" => $message,
            'data' => [],
            'errors' => $errors
        ], $statusCode);
    }

    public static function validationError(ValidationException $exception): JsonResponse
    {
        return self::error($exception->errors(), 'Validation Error', 422);
    }
}