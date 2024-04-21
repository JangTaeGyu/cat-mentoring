<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\V1\Repositories\Models\Question;

interface AnswerRepositoryInterface
{
    public function create(Question $question, array $attributes): Model;
    public function accept(): void;
    public function unaccepted(): void;
    public function delete(): void;
}
