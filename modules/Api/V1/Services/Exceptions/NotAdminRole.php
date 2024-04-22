<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class NotAdminRole extends HttpException
{
    public function __construct()
    {
        parent::__construct('회원이 Admin 권한이 아닙니다.');
    }
}
