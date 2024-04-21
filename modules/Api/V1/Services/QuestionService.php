<?php

namespace Modules\Api\V1\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Api\V1\Repositories\QuestionRepositoryInterface;
use Modules\Api\V1\Services\Data\InputQuestionData;
use Modules\Api\V1\Services\Data\SearchQuestionData;

readonly class QuestionService
{
    public function __construct(
        private QuestionRepositoryInterface $questionRepository
    ) {
    }

    public function getPaginatedQuestions(SearchQuestionData $data): LengthAwarePaginator
    {
        return $this->questionRepository->findAllAndPagination($data->getPage(), $data->getPerPage());
    }

    public function create(InputQuestionData $data): Question {
        $createData = array_merge($data->toData(), [
            'user_id' => $data->getUser()->id
        ]);

        /** @var Question $question */
        $question = $this->questionRepository->create($createData);

        return $question;
    }
}
