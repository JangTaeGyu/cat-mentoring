<?php

namespace Modules\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function setModel(Model $model): static;
}
