<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ModelNotFoundExceptionRenderer implements Renderable
{
    public function render($request, \Exception $e): mixed
    {
        return response()->json(
            [
                'code' => ResponseAlias::HTTP_NOT_FOUND,
                'error' => [
                    'message' => 'model not found',
                ],
            ],
        );
    }
}
