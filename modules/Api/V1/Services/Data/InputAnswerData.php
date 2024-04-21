<?php

namespace Modules\Api\V1\Services\Data;

use Modules\Api\V1\Repositories\Models\Question;
use Modules\Api\V1\Repositories\Models\User;
use Modules\Core\Data\AbstractData;

class InputAnswerData extends AbstractData
{
    protected string $contents;
    protected Question $question;
    protected User $user;

    public function getContents(): string
    {
        return $this->contents;
    }

    public function setContents(string $contents): void
    {
        $this->contents = $contents;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): void
    {
        $this->question = $question;
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
            ->except(['question', 'user'])
            ->toArray();
    }
}
