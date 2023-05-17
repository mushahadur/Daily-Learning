<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        if (count(Auth()->user()->roles) == 0) {
            abort(401, "User can't perform this actions");
        } else {
            if (Auth()->user()->roles[0]->name === 'Customer') {
                return redirect('/dashboard');
            }
        }
        if (count(Auth()->user()->roles) == 0) {
            abort(401, "User can't perform this actions");
        } else {
            if (Auth()->user()->roles[0]->name === 'Customer') {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
