<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;


class AuthenticateAdmin {


	public function handle($request, Closure $next)
	{
        if (Auth::check())
        {
            if(Auth::user()->email === '***REMOVED***')
            {
                return $next($request);
            }
        }

        return redirect()->guest('auth/login');
	}

}
