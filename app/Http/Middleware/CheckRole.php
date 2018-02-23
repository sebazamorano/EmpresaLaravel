<?php

namespace Empresa\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::guest() && $request->user()->checkRole($role)) {
            return $next($request);
        }

        if ($request->ajax()) {
            return response()->json('no estas autorizado', 403);
        }

        return redirect()->to('documentos');
    }
}
