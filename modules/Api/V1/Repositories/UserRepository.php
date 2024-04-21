<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\V1\Repositories\Models\User;
use Modules\Core\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?Model
    {
        return $this->query()
            ->where('email', $email)
            ->first();
    }

    public function findById(int $id): ?Model
    {
        return $this->query()
            ->where('id', $id)
            ->first();
    }

    public function create(array $attributes): Model
    {
        return $this->query()->create($attributes);
    }

    public function update(array $attributes): bool
    {
        return $this->model->update($attributes);
    }

    public function approve(int $userId, array $attributes): bool
    {
        // TODO: Implement approve() method.
    }
}
