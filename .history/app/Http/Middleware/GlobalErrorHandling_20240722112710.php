<?php // app/Http/Middleware/GlobalErrorHandling.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GlobalErrorHandling
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (\Throwable $e) {
            return $this->handleException($e, $request);
        }
    }

    /**
     * Handle exceptions and return custom responses.
     *
     * @param  \Throwable  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function handleException(\Throwable $e, $request)
    {
        // Log the error
        Log::error($e->getMessage(), [
            'exception' => $e,
            'url' => $request->fullUrl(),
            'input' => $request->all(),
        ]);

        // Handle specific exceptions
        if ($e instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($e instanceof AccessDeniedHttpException) {
            return response()->view('errors.403', [], 403);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.405', [], 405);
        }

        if ($e instanceof HttpException) {
            return response()->view('errors.500', ['error' => $e->getMessage()], 500);
        }

        // Handle generic exceptions
        return response()->view('errors.500', ['error' => 'An unexpected error occurred.'], 500);
    }
}
