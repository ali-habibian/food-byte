<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Updates the user profile with the validated data from the request.
     *
     * @param ProfileUpdateRequest $request The request object containing the validated data.
     * @return RedirectResponse The response to redirect back to the previous page.
     */
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        Toastr::success(
            'Profile updated.',
            'Success',
            [
                'progressBar' => true,
                "positionClass" => "toast-top-center"
            ]
        );

        return redirect()->back();
    }

    /**
     * Updates the user's password with the provided request data.
     *
     * @param ProfilePasswordUpdateRequest $request The request object containing the new password.
     * @return RedirectResponse The response to redirect back to the previous page.
     */
    public function updatePassword(ProfilePasswordUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        Toastr::success(
            'Password updated.',
            'Success',
            [
                'progressBar' => true,
                "positionClass" => "toast-top-center"
            ]
        );

        return redirect()->back();
    }
}
