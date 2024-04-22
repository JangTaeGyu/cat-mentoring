<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = Response::HTTP_UNAUTHORIZED;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => '승인이 필요 합니다.'
            ],
        ], $httpStatusCode);
    }
}
