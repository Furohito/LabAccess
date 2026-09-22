<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminRegister
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
        if (!env('ADMIN_REGISTER_ENABLED', false)) {
            return redirect('/admin-login')->withErrors(['register' => 'Registration is currently disabled.']);
        }

        return $next($request);
    }
}
