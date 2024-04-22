<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthenticationExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = ResponseAlias::HTTP_UNAUTHORIZED;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => '승인이 필요 합니다.'
            ],
        ], $httpStatusCode);
    }
}
