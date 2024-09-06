<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Return a success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    // public function successResponse($data = [], $message = 'Success', $statusCode = 200): JsonResponse
    // {

    //     return response()->json([
    //         'code' => $statusCode,
    //         'message' => $message,
    //         'data' => $data
    //     ], $statusCode);
    // }
    public function successResponse($data = [], $message = 'Success', $statusCode = 200, $extra = []): JsonResponse
    {
        return response()->json(array_merge([
            'code' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $extra), $statusCode);
    }


    /**
     * Return an error response.
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function errorResponse($message = 'Error', $statusCode = 400): JsonResponse
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
            'data' => []
        ], $statusCode);
    }
}
