<?php

namespace Modules\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Api\V1\Services\Exceptions\UnsignupedUserException;

class CheckSignuped
{
    public function handle(Request $request, Closure $next)
    {
        $user = getLoggedIn();
        if ($user->isSignuped()) {
            return $next($request);
        }

        throw new UnsignupedUserException();
    }
}
