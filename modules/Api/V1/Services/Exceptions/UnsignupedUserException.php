<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class UnsignupedUserException extends HttpException
{
    public function __construct()
    {
        parent::__construct('가입되지 않은 회원 입니다.');
    }
}
