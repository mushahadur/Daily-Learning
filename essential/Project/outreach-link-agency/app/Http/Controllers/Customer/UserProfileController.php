<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\ExploreCountryRepository;
use App\Repositories\Interfaces\ProfileRepositoryInterface;

class UserProfileController extends Controller
{
    private $profilerepository;

    public function __construct(ProfileRepositoryInterface $profileinterface)
    {
        $this->profilerepository = $profileinterface;
    }
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $user = $this->profilerepository->authInfo();
        $country_list = (new ExploreCountryRepository())->all();
        return view('customer.profile.index', get_defined_vars());
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $user)
    {
        $this->profilerepository->updateUser($request, $user);
        toast('Your Profile updated!', 'success');
        return Redirect::route('user-profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/login');
    }
    
}
