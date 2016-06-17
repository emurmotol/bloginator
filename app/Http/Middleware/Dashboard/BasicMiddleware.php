<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class BasicMiddleware
 * @package App\Http\Middleware
 */
class BasicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->type_id === intval(trans('model.type.basic.id'))) {
            return $next($request);
        }
        return redirect()->back();
    }
}
