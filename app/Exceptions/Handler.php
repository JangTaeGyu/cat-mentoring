<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Core\Exceptions\Renderers\AuthenticationExceptionRenderer;
use Modules\Core\Exceptions\Renderers\NotFoundHttpExceptionRenderer;
use Modules\Core\Exceptions\Renderers\ValidationExceptionRenderer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });

        $this->renderable(fn (NotFoundHttpException $e, Request $request) => NotFoundHttpExceptionRenderer::render($request, $e));
        $this->renderable(fn (ValidationException $e, Request $request) => ValidationExceptionRenderer::render($request, $e));
        $this->renderable(fn (AuthenticationException $e, Request $request) => AuthenticationExceptionRenderer::render($request, $e));

        $this->renderable(fn (\Exception $e, Request $request) => dd($e));
    }
}
