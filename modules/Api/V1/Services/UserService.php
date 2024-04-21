<?php

namespace Modules\Api\V1\Services;

use Modules\Api\V1\Repositories\Models\Enums\UserRole;
use Modules\Api\V1\Repositories\Models\User;
use Modules\Api\V1\Repositories\UserRepositoryInterface;
use Modules\Api\V1\Services\Data\ApproveMentorData;
use Modules\Api\V1\Services\Data\SignupData;
use Modules\Api\V1\Services\Exceptions\AlreadyRegisteredUserException;
use Modules\Api\V1\Services\Exceptions\NotFoundUserException;
use Modules\Api\V1\Services\Exceptions\NotAdminRole;

readonly class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    /**
     * 이미 가입 회원인지 체크
     *
     * @param User $user
     * @return void
     */
    private function checkAlreadyRegisteredUser(User $user): void
    {
        if ($user->isSignuped()) {
            throw new AlreadyRegisteredUserException();
        }
    }

    /**
     * 멘토 권한 체크
     *
     * @param User $user
     * @return void
     */
    private function checkAdminUser(User $user): void
    {
        if ($user->role->value !== UserRole::ADMIN->value) {
            throw new NotAdminRole();
        }
    }

    public function signup(SignupData $data): void
    {
        $this->checkAlreadyRegisteredUser($data->getUser());

        $signupData = array_merge($data->toData(), ['signup_at' => now()]);
        $data->getUser()->repository()->update($signupData);
    }

    public function approveMentor(ApproveMentorData $data): void
    {
        $this->checkAdminUser($data->getUser());

        /** @var User $user */
        $user = $this->userRepository->findById($data->getUserId());
        if ($user) {
            $user->repository()->update([
                'role' => UserRole::MENTOR->value,
                'approved_id' => $data->getUser()->id,
                'approved_at' => now()
            ]);
        } else {
            throw new NotFoundUserException();
        }
    }
}
