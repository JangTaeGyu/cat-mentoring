<?php

namespace Modules\Api\V1\Services;

use Laravel\Socialite\Contracts\User;
use Modules\Api\V1\Repositories\Models\Enums\UserRole;
use Modules\Api\V1\Repositories\UserRepositoryInterface;
use Modules\Api\V1\Repositories\Models\User as AppUser;

readonly class GoogleAuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function signup(User $user): AppUser
    {
        /** @var AppUser $userFoundByEmail */
        $userFoundByEmail = $this->userRepository->findByEmail($user->getEmail());
        if ($userFoundByEmail === null) {
            /** @var AppUser $createdUser */
            $createdUser = $this->userRepository->create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'role' => UserRole::MENTEE->value,
            ]);

            return $createdUser;
        }

        return $userFoundByEmail;
    }
}
