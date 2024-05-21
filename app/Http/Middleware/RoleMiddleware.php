<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This middleware checks if the authenticated user has the specified role.
 */
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request The incoming request
     * @param Closure $next The next middleware to execute
     * @param string $role The required role for this route
     * @return Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException If user doesn't have the required role
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role === $role) {
            return $next($request);
        }

        return to_route('dashboard');
    }
}
