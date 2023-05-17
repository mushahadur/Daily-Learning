<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        if (count(Auth()->user()->roles) == 0) {
            abort(401, "User can't perform this actions");
        } else {
            if (Auth()->user()->roles[0]->name != 'Customer') {
                return redirect('/admin/dashboard');
            }
        }

        return $next($request);
    }
}
