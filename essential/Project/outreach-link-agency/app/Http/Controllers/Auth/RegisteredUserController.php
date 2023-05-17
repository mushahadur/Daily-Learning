<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $redirect_url = $request->input('redirect_url') ?? RouteServiceProvider::HOME;
        return view('auth.register', compact('redirect_url'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole("Customer");

        event(new Registered($user));

        // Create a free subscription plan
        $plan_id = SubscribePlan::where('name', 'Basic Plan')->first()->id;
        Subscriber::create([
            'user_id' => $user->id,
            'plan_id' => $plan_id,
            'active_until' => Carbon::now(),
            'status' => 0,
        ]);
        Auth::login($user);

        return redirect($request->redirect_url);
    }
}
