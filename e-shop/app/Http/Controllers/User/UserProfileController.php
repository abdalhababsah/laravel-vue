<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\UserAddress;

class UserProfileController extends Controller
{

    public function edit(Request $request)
    {
        $user = Auth::user();
        $address = $user->userAddresses()->first();

        return Inertia::render('User/Dashboard/Profile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'address' => $address,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('user.profile');
    }


     public function updateAddress(AddressUpdateRequest $request)
     {
         $user = Auth::user();

         $address = $user->userAddresses()->first();

         if (!$address) {
             $address = new UserAddress();
             $address->user_id = $user->id;
         }

         $address->fill($request->validated());
         $address->save();

         return redirect()->route('user.profile')->with('status', 'Address updated successfully!');
     }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }

}
