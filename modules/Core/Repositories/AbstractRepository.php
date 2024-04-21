<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function __construct(
        protected Model $model
    ) {
    }

    protected function query(): Builder
    {
        return $this->model->query();
    }

    public function setModel(Model $model): static
    {
        $this->model = $model;

        return $this;
    }
}
