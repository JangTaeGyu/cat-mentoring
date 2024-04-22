<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class NotFoundUserException extends HttpException
{
    public function __construct()
    {
        parent::__construct('존재하지 않는 회원 입니다.');
    }
}
