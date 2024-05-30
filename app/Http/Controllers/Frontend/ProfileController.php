<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

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

    /**
     * Updates the user's avatar with the provided image path.
     *
     * @param Request $request The request object containing the avatar image.
     * @return Response The response with the status and message of the avatar update.
     */
    public function updateAvatar(Request $request): Response
    {
        $imagePath = $this->uploadImage($request, 'avatar');

        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();

        Toastr::success(
            'Avatar updated.',
            'Success',
            [
                'progressBar' => true,
                "positionClass" => "toast-top-center"
            ]
        );
        return response(['status' => 'success', 'message' => 'Avatar updated.']);
    }
}
