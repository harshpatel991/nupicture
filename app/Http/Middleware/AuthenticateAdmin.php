<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;


class AuthenticateAdmin {


	public function handle($request, Closure $next)
	{
        if (Auth::check())
        {
            if(Auth::user()->email === 'ipod998@gmail.com')
            {
                return $next($request);
            }
        }

        return redirect()->guest('auth/login');
	}

}
