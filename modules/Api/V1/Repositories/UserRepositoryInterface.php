<?php

namespace Modules\Api\V1\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?Model;
    public function findById(int $id): ?Model;
    public function create(array $attributes): Model;
    public function update(array $attributes): bool;
}
