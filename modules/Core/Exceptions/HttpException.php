<?php

namespace Modules\Core\Exceptions;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HttpException extends \RuntimeException
{
    protected int $statusCode;

    public function __construct(string $message, int $statusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct($message, $statusCode);
        $this->statusCode = $statusCode;
    }

    public function render($request): JsonResponse
    {
        return response()->json([
            'code' => $this->statusCode,
            'error' => [
                'message' => $this->getMessage()
            ],
        ], $this->statusCode);
    }
}
