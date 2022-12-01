<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as Code;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Успешный ответ API.
     *
     * @param string|null $message
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    protected function successResponse(
        ?string $message = null,
        array $data = [],
        int $code = Code::HTTP_OK
    ): JsonResponse {
        $result = array_merge(
            $message ? ['message' => __($message)] : [],
            $data
        );

        return response()->json($result, $code);
    }

    /**
     * Успешный ответ с data данными.
     *
     * @param array $data
     * @param array $additional
     * @return JsonResponse
     */
    protected function dataResponse(array $data = [], array $additional = []): JsonResponse
    {
        return self::successResponse(
            null,
            array_merge(isset($data['data']) ? $data : ['data' => $data], $additional)
        );
    }

    /**
     * Успешный ответ API без содержимого.
     *
     * @return JsonResponse
     */
    protected function successResponseWithoutContent(): JsonResponse
    {
        return self::successResponse(null, [], Code::HTTP_NO_CONTENT);
    }

    /**
     * Ответ API с ошибкой.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function errorResponse(string $message, int $code = Code::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(['message' => __($message)], $code ?: Code::HTTP_BAD_GATEWAY);
    }
}
