<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    use FileUploadTrait;

    /**
     * Retrieves the view for the admin profile index page.
     *
     * @return View The view for the admin profile index page.
     */
    public function index(): View
    {
        return view('admin.profile.index');
    }

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
        $user->email= $request->email;
        if ($request->hasFile('avatar')) {
            $user->avatar = $this->uploadImage($request, 'avatar');
        }

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
     * Updates the user password with the validated data from the request.
     *
     * @param ProfileUpdateRequest $request The request object containing the validated data.
     * @return RedirectResponse The response to redirect back to the previous page.
     */
    public function updatePassword(ProfilePasswordUpdateRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->validated()['password']),
        ]);

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
