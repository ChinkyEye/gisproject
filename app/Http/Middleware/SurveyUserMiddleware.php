<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Auth;


class SurveyUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {
         if (!$this->auth->check() || ($request->user()->user_type != '4' || $request->user()->is_active != '1')) {
            $this->auth->logout();
            return redirect ('/login')->with('message', 'Account Disable!');
        }
        return $next($request);
    }
}
