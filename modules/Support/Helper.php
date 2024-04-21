<?php

use Illuminate\Support\Facades\Auth;
use Modules\Api\V1\Repositories\Models\User;

if (!function_exists('isLocal')) {
    function isLocal(): bool
    {
        return app()->environment() === 'local';
    }
}

if (!function_exists('getLoggedIn')) {
    function getLoggedIn(): ?User
    {
        /** @var User $user */
        $user = Auth::user();

        return $user;
    }
}
