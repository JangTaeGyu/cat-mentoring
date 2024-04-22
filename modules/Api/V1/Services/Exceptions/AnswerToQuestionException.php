<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class AnswerToQuestionException extends HttpException
{
    public function __construct()
    {
        parent::__construct('질문에 대한 답변이 아닙니다.');
    }
}
