<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class AlreadyRegisteredUserException extends HttpException
{
    public function __construct()
    {
        parent::__construct('이미 가입된 회원 입니다.');
    }
}
