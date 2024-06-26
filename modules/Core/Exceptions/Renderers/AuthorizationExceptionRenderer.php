<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = Response::HTTP_FORBIDDEN;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => '접근 거부 되었습니다.'
            ],
        ], $httpStatusCode);
    }
}
