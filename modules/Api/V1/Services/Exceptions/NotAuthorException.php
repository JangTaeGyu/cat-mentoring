<?php

namespace Modules\Api\V1\Services\Exceptions;

use Modules\Core\Exceptions\HttpException;

class NotAuthorException extends HttpException
{
    public function __construct()
    {
        parent::__construct('작성자가 아닙니다.');
    }
}
