<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponse;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class Authenticate
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if ($this->auth->guard($guards[0] ?? null)->guest()) {
            return $this->unauthenticated($request);
        }

        return $next($request);
    }

    protected function unauthenticated(Request $request)
    {
        if ($request->expectsJson()) {
            return ApiResponse::error('unauthenticated', 401);
        }

        return redirect()->guest('/login');
    }
}
