<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotFoundHttpExceptionRenderer implements Renderable
{
    public static function render(Request $request, \Exception $e): mixed
    {
        $httpStatusCode = Response::HTTP_NOT_FOUND;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => '모델 데이터가 존재하지 않습니다.',
            ],
        ], $httpStatusCode);
    }
}
