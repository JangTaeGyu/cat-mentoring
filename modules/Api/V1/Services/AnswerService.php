<?php

namespace Modules\Api\V1\Services;

use Modules\Api\V1\Repositories\AnswerRepositoryInterface;
use Modules\Api\V1\Repositories\Models\Answer;
use Modules\Api\V1\Repositories\Models\Question;
use Modules\Api\V1\Services\Data\InputAnswerData;
use Modules\Api\V1\Services\Exceptions\AcceptedAnswerException;
use Modules\Api\V1\Services\Exceptions\AnswerRegistrationCountLimitException;
use Modules\Api\V1\Services\Exceptions\AnswerToQuestionException;

readonly class AnswerService
{
    public function __construct(
        private AnswerRepositoryInterface $answerRepository
    ) {
    }

    /**
     * 질문에 대한 답변 등록한도 체크하기
     *
     * @param Question $question
     * @param int $limit
     * @return void
     */
    private function checkAnswerRegistrationCountLimit(Question $question, int $limit): void
    {
        $countOfAnswers = $question->repository()->countOfAnswers();
        if ($countOfAnswers >= $limit) {
            throw new AnswerRegistrationCountLimitException();
        }
    }

    public function create(InputAnswerData $data): Answer
    {
        $this->checkAnswerRegistrationCountLimit($data->getQuestion(), 3);

        $createData = array_merge($data->toData(), [
            'user_id' => $data->getUser()->id
        ]);

        /** @var Answer $answer */
        $answer = $this->answerRepository->create($data->getQuestion(), $createData);

        return $answer;
    }

    /**
     * 질문에 대한 답변 체크
     *
     * @param Question $question
     * @param Answer $answer
     * @return void
     */
    private function checkAnswerToQuestion(Question $question, Answer $answer): void
    {
        if ($question->id !== $answer->question_id) {
            throw new AnswerToQuestionException();
        }
    }

    /**
     * 이미 채택된 답변 체크
     *
     * @param Answer $answer
     * @return void
     */
    private function checkAcceptedAnswer(Answer $answer): void
    {
        if ($answer->isAccepted()) {
            throw new AcceptedAnswerException();
        }
    }

    public function accept(Question $question, Answer $answer): void
    {
        $this->checkAnswerToQuestion($question, $answer);
        $this->checkAcceptedAnswer($answer);

        $answer->repository()->accept();
    }

    public function unaccepted(Question $question, Answer $answer): void
    {
        $this->checkAnswerToQuestion($question, $answer);

        $answer->repository()->unaccepted();
    }

    public function delete(Question $question, Answer $answer): void
    {
        $this->checkAnswerToQuestion($question, $answer);
        $this->checkAcceptedAnswer($answer);

        $answer->repository()->delete();
    }
}
