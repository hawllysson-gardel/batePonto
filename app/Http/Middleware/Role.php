<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class Role
{
    const DELIMITER = '|';

    protected $auth;

	/**
	 * Creates a new instance of the middleware.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!is_array($roles)) {
			$roles = explode(self::DELIMITER, $roles);
		}

		if ($this->auth->guest() || !$request->user()->hasRole($roles)) {
			abort(403);
		}

        return $next($request);
    }
}
