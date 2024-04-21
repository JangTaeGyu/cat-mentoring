<?php

namespace Modules\Api\V1\Services\Data;

use Modules\Api\V1\Repositories\Models\User;
use Modules\Core\Data\AbstractData;

class SignupData extends AbstractData
{
    protected string $cat_breed;
    protected string $cat_age;
    protected User $user;

    public function getCatBreed(): string
    {
        return $this->cat_breed;
    }

    public function setCatBreed(string $cat_breed): void
    {
        $this->cat_breed = $cat_breed;
    }

    public function getCatAge(): string
    {
        return $this->cat_age;
    }

    public function setCatAge(string $cat_age): void
    {
        $this->cat_age = $cat_age;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function toData(): array
    {
        return $this->toCollection()
            ->except(['user'])
            ->toArray();
    }
}
