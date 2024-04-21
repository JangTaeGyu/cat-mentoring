<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Modules\Core\Exceptions\Renderers\ModelNotFoundExceptionRenderer;
use Throwable;
use function Termwind\render;

class Handler extends ExceptionHandler
{
    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $e)
    {
        parent::report($e);
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return (new ModelNotFoundExceptionRenderer())->render($request, $e);
        }

        return parent::render($request, $e);

    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            dd($e->getMessage());
        });
    }
}
