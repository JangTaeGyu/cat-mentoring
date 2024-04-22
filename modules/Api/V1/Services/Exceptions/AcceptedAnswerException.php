<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class AcceptedAnswerException extends HttpException
{
    public function __construct()
    {
        parent::__construct('이미 채택된 답변 입니다.');
    }
}
