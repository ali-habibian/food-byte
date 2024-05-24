<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminProfileController extends Controller
{
    /**
     * Retrieves the view for the admin profile index page.
     *
     * @return View The view for the admin profile index page.
     */
    public function index(): View
    {
        return view('admin.profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

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
}
