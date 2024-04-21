<?php

namespace Modules\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Api\V1\Controllers\Requests\InputAnswerRequest;
use Modules\Api\V1\Controllers\Resources\CreatedResource;
use Modules\Api\V1\Repositories\Models\Answer;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Api\V1\Services\AnswerService;
use Modules\Api\V1\Services\Data\InputAnswerData;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    public function __construct(
        private readonly AnswerService $answerService
    ) {
    }

    public function createAnswer(Question $question, InputAnswerRequest $request): JsonResponse
    {
        /** @var InputAnswerData $data */
        $data = $request->toData();
        $data->setQuestion($question);
        $data->setUser(getLoggedIn());

        $answer = $this->answerService->create($data);

        return (new CreatedResource($answer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function acceptAnswer(Question $question, Answer $answer): Response
    {
        $this->answerService->accept($question, $answer, getLoggedIn());

        return response(null, Response::HTTP_OK);
    }

    public function unacceptedAnswer(Question $question, Answer $answer): Response
    {
        $this->answerService->unaccepted($question, $answer, getLoggedIn());

        return response(null, Response::HTTP_OK);
    }

    public function deleteAnswer(Question $question, Answer $answer): Response
    {
        $this->answerService->delete($question, $answer, getLoggedIn());

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
