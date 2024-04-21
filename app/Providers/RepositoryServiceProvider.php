<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Api\V1\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Repositories\UserRepositoryInterface::class, Repositories\UserRepository::class);
        $this->app->bind(Repositories\QuestionRepositoryInterface::class, Repositories\QuestionRepository::class);
        $this->app->bind(Repositories\AnswerRepositoryInterface::class, Repositories\AnswerRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
