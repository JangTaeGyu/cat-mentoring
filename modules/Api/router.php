<?php

use Illuminate\Support\Facades\Route;
use Modules\Api\V1\Controllers;
use Modules\Middleware\CheckSignuped;
use Modules\Middleware\JsonContentTypeHeader;


/**
 * Cat Mentoring Application Routes
 */
Route::middleware([
    JsonContentTypeHeader::class
])->prefix('v1')->group(function () {
    Route::get('questions', [Controllers\QuestionController::class, 'getQuestions']);
    Route::get('questions/{question}', [Controllers\QuestionController::class, 'getQuestion'])->where('question', '[0-9]+');

    Route::middleware([
        'auth:sanctum'
    ])->group(function () {
        Route::put('signup', [Controllers\UserController::class, 'signup'])->name('signup');

        Route::middleware([
            CheckSignuped::class
        ])->group(function () {
            Route::put('approve-mentor', [Controllers\UserController::class, 'approveMentor']);

            Route::post('questions', [Controllers\QuestionController::class, 'createQuestion']);

            Route::prefix('questions/{question}')
                ->group(function () {
                    Route::post('answers', [Controllers\AnswerController::class, 'createAnswer']);
                    Route::put('answers/{answer}/accept', [Controllers\AnswerController::class, 'acceptAnswer']);
                    Route::put('answers/{answer}/unaccepted', [Controllers\AnswerController::class, 'unacceptedAnswer']);
                    Route::delete('answers/{answer}', [Controllers\AnswerController::class, 'deleteAnswer']);
                });
        });
    });
});
