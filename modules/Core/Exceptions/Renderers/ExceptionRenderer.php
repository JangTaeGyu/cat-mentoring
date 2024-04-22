<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => '서버 오류'
            ],
        ], $httpStatusCode);
    }
}
