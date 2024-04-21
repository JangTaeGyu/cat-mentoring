<?php

namespace Modules\Core\Exceptions\Renderers;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ModelNotFoundExceptionRenderer implements Renderable
{
    public function render($request, \Exception $e): mixed
    {
        $httpStatusCode = ResponseAlias::HTTP_NOT_FOUND;

        return response()->json([
            'code' => $httpStatusCode,
            'error' => [
                'message' => 'model not found',
            ],
        ], $httpStatusCode);
    }
}
