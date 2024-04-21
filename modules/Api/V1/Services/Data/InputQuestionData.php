<?php

namespace Modules\Api\V1\Services\Data;

use Modules\Api\V1\Repositories\Models\User;
use Modules\Core\Data\AbstractData;

class InputQuestionData extends AbstractData
{
    protected string $title;
    protected string $contents;
    protected User $user;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContents(): string
    {
        return $this->contents;
    }

    public function setContents(string $contents): void
    {
        $this->contents = $contents;
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
