<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $roleNames
     * @return mixed
     */
    public function handle($request, Closure $next, $roleNames)
    {
        /** @var array $roles */
        $roles = explode(';', $roleNames);

        if( ! in_array(auth()->user()->role, $roles)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->to('/');
            }
        }

        return $next($request);
    }
}
