<?php
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 'User') {
            return $next($request);
        }

        return redirect('/dashboard'); // Redirect non-user accounts
    }
}
