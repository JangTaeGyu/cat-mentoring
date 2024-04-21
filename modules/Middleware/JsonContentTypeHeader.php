<?php

namespace Modules\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JsonContentTypeHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof Response && is_null($response->headers->get('Content-Type'))) {
            $response->header('Content-Type', 'application/json');
        }

        return $response;
    }
}
