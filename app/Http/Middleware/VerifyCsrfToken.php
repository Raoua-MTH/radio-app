<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     *
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function handle($request, Closure $next)
    {
        // Check if the request is an in-app request and should bypass CSRF check
        if ($this->shouldPassThrough($request)) {
            return $next($request);
        }

        // Verify CSRF token
        if ($request->routeIs('webhooks.*')) {
            // This is an example. You should adjust this according to your routes.
            // If the route name starts with 'webhooks.', it's assumed to be exempt from CSRF protection.
            return $next($request);
        }

        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if (! $token) {
            throw new TokenMismatchException('CSRF token not found.');
        }

        if (! hash_equals($request->session()->token(), $token)) {
            throw new TokenMismatchException('CSRF token mismatch.');
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $except = [
           "send-email"
        ];

        foreach ($except as $except) {
            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
