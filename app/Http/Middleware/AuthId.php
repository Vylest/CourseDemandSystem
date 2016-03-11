<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthId
{
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($request->route('id') == Auth::user()->id) {
            return $next($request);
        } else {
            return redirect(url('/home'))->with('message', 'You are not permitted to complete that action. If you are an administrator and would like to update another user, go to Manage Users.');
        }
    }
}
