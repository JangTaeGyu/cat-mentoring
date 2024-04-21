<?php

namespace Modules\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Api\V1\Controllers\Requests\InputQuestionRequest;
use Modules\Api\V1\Controllers\Requests\SearchQuestionRequest;
use Modules\Api\V1\Controllers\Resources\CreatedResource;
use Modules\Api\V1\Controllers\Resources\QuestionCollection;
use Modules\Api\V1\Controllers\Resources\QuestionDetailsResource;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Api\V1\Services\Data\InputQuestionData;
use Modules\Api\V1\Services\Data\SearchQuestionData;
use Modules\Api\V1\Services\QuestionService;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function __construct(
        private readonly QuestionService $questionService
    ) {
    }

    public function getQuestions(SearchQuestionRequest $request): QuestionCollection
    {
        /** @var SearchQuestionData $data */
        $data = $request->toData();

        $questions = $this->questionService->getPaginatedQuestions($data);

        return new QuestionCollection($questions);
    }

    public function createQuestion(InputQuestionRequest $request): JsonResponse
    {
        /** @var InputQuestionData $data */
        $data = $request->toData();
        $data->setUser(getLoggedIn());

        $question = $this->questionService->create($data);

        return (new CreatedResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function getQuestion(Question $question): QuestionDetailsResource
    {
        $question->load(['user', 'answers', 'answers.user']);

        return new QuestionDetailsResource($question);
    }
}
