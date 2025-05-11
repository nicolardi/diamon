<?php
namespace App\Helpers;

class ApiResponse
{
    public static function success($data = [], $message = 'success')
    {
        return response()->json([
            'status' => 'OK',
            'message' => $message,
            'data' => $data,
        ]);
    }

    public static function error($message = 'Errore', $code = 400)
    {
        return response()->json([
            'status' => 'KO',
            'message' => $message,
        ], $code);
    }
}