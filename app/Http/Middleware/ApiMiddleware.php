<?php

namespace App\Http\Middleware;

use App\ApplicationTraits\ApiTraits;
use Closure;
use Illuminate\Support\Facades\Auth;

class ApiMiddleware
{

    use ApiTraits;
    /**
     * Handle an incoming request for API calls
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        try{
            ApiTraits::validateApiToken($request->header('token'));
        } catch (\Exception $e) {
            return ApiTraits::json([], 'COULD NOT VALIDATE TOKEN', 503, [$e->getMessage()]);
        }

        return $next($request);
    }
}
