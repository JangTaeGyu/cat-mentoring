<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface QuestionRepositoryInterface
{
    public function findAllAndPagination(int $page, int $perPage): LengthAwarePaginator;
    public function create(array $attributes): Model;
    public function countOfAnswers(): int;
}
