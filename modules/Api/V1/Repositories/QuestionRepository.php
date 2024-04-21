<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Core\Repositories\AbstractRepository;

class QuestionRepository extends AbstractRepository implements QuestionRepositoryInterface
{
    public function __construct(Question $model)
    {
        parent::__construct($model);
    }

    public function findAllAndPagination(int $page, int $perPage): LengthAwarePaginator
    {
        return $this->query()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function create(array $attributes): Model
    {
        return $this->query()->create($attributes);
    }

    public function countOfAnswers(): int
    {
        /** @var Question $model */
        $model = $this->model;

        return $model->answers()->count();
    }
}
