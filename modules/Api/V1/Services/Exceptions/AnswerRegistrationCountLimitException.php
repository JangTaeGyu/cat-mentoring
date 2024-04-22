<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class AnswerRegistrationCountLimitException extends HttpException
{
    public function __construct()
    {
        parent::__construct('질문에 대한 답변 등록 한도를 초과 하였습니다.');
    }
}
