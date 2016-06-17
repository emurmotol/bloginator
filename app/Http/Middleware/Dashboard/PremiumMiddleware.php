<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class PremiumMiddleware
 * @package App\Http\Middleware
 */
class PremiumMiddleware
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
        if (Auth::user()->type_id === intval(trans('model.type.premium.id'))) {
            return $next($request);
        }
        return redirect()->back();
    }
}
