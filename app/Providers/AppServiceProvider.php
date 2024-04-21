<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (isLocal()) {
            Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
                Log::info('', [
                    'sql' => $query->sql,
                    'bindings' => $query->bindings,
                    'time' => $query->time
                ]);
            });
        }
    }
}
