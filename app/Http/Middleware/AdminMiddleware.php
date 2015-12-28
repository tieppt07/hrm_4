<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Config;

class AdminMiddleware
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
        if ($request->user()->role == User::IS_ADMIN) {
            return $next($request);
        }
        return redirect('home');
    }
}
