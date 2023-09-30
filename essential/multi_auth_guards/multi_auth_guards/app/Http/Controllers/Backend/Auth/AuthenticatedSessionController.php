<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;
       /**
     * Display the login Form view.
     */
    public function showLogingForm(): View
    {
        return view('backend.auth.login');
    }

    public function login(Request $request){

        //Validate Login Data
        $request->validate([
            'email' => 'required |max:50',
            'password' => 'required',
        ]);

        $checkEmailPassword = Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password],$request->remember);
        $checkUserNamePassword = Auth::guard('admin')->attempt(['username'=> $request->email, 'password' => $request->password],$request->remember);

        if($checkEmailPassword | $checkUserNamePassword ){  
        // Redirect admin dashboard
        return redirect()->intended(route('admin.dashboard'));
        }
        else{
            // go to login form and also error show
            return back()->with('message', 'Please, Enter the Valide Username /Email and Password !.');;
        }
    }

    //Logout Admin
    public function logout(){
        // dd('some');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

 
}
