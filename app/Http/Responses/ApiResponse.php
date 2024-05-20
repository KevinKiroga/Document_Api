<?php

namespace App\Http\Responses;

class ApiResponse {

    // Esturcutra del JSON de la API-SUCCESS
    public static function success ($message, $statusCode, $data = []) 
    {
        return response()->json([
            'message'     => $message,
            'statusCode'  => $statusCode,
            'error'       => false,
            'data'        => $data
        ], $statusCode);
    }

    // Esturcutra del JSON de la API-ERROR
    public static function error ($message, $statusCode, $data = []) 
    {
        return response()->json([
            'message'     => $message,
            'statusCode'  => $statusCode,
            'error'       => true,
            'data'        => $data
        ], $statusCode);
    }
}