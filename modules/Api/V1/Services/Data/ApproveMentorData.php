<?php

namespace Modules\Api\V1\Services\Data;

use Modules\Api\V1\Repositories\Models\User;

class ApproveMentorData
{
    protected int $user_id;
    protected User $user;

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
