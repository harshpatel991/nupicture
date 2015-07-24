<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;

class VerifyConfirmedAccount {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if (Auth::check())
        {
            if(Auth::user()->status === 'good' || Auth::user()->status === 'warning')
            {
                return $next($request);
            }
        }

        return new RedirectResponse(url('/sign-up-success'));

	}

}
