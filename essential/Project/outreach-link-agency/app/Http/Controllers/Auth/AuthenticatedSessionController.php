<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        $redirect_url = $request->input('redirect') ?? RouteServiceProvider::HOME;
        return view('auth.login', compact('redirect_url'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        // Checking subscription plan
        $subscription_checking = Subscriber::where('user_id', Auth::user()->id)->first();
        // Create a free subscription plan
        if (empty($subscription_checking)) {
            $plan_id = SubscribePlan::where('name', 'Basic Plan')->first()->id;
            Subscriber::create([
                'user_id' => Auth::user()->id,
                'plan_id' => $plan_id,
                'active_until' => Carbon::now(),
                'status' => 0,
            ]);
        }
        return redirect()->intended($request->redirect_url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
