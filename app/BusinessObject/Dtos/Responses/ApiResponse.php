<?php

namespace App\BusinessObject\Dtos\Responses;

class ApiResponse {
    public static function success ($message, $statusCode, $data = []) 
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $statusCode,
            'error' => false,
            'data' => $data
        ], $statusCode);
    }

    public static function error ($message, $statusCode, $data = []) 
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $statusCode,
            'error' => true,
            'data' => $data
        ], $statusCode);
    }
}