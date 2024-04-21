<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\V1\Repositories\Models\Answer;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Core\Repositories\AbstractRepository;

class AnswerRepository extends AbstractRepository implements AnswerRepositoryInterface
{
    public function __construct(Answer $model)
    {
        parent::__construct($model);
    }

    public function create(Question $question, array $attributes): Model
    {
        return $question->answers()->create($attributes);
    }

    public function accept(): void
    {
        $this->model->update([
            'accepted_at' => now()
        ]);
    }

    public function unaccepted(): void
    {
        $this->model->update([
            'accepted_at' => null
        ]);
    }

    public function delete(): void
    {
        $this->model->delete();
    }
}
