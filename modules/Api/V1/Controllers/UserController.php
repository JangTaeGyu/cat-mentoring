<?php

namespace Modules\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Modules\Api\V1\Controllers\Requests\ApproveMentorRequest;
use Modules\Api\V1\Controllers\Requests\SignupRequest;
use Modules\Api\V1\Services\Data\ApproveMentorData;
use Modules\Api\V1\Services\Data\SignupData;
use Modules\Api\V1\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function signup(SignupRequest $request): Response
    {
        /** @var SignupData $data */
        $data = $request->toData();
        $data->setUser(getLoggedIn());

        $this->userService->signup($data);

        return response(null, Response::HTTP_OK);
    }

    public function approveMentor(ApproveMentorRequest $request): Response
    {
        /** @var ApproveMentorData $data */
        $data = $request->toData();
        $data->setUser(getLoggedIn());

        $this->userService->approveMentor($data);

        return response(null, Response::HTTP_OK);
    }
}
