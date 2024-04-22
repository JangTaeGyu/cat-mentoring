<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidationExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = Response::HTTP_UNPROCESSABLE_ENTITY;

        /** @var ValidationException $_e */
        $_e = $e;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => $_e->errors()
            ],
        ], $httpStatusCode);
    }
}
