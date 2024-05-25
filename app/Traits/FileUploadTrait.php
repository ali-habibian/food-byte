<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{
    /**
     * Uploads an image from the given request and saves it to the specified path.
     *
     * @param Request $request The HTTP request object.
     * @param string $inputName The name of the input field containing the image.
     * @param string $path The path to save the image (default: '/uploads').
     * @return string|null The path to the uploaded image, or null if no file was uploaded.
     */
    function uploadImage(Request $request, $inputName, $path = '/uploads')
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$ext;
            $image->move(public_path($path), $imageName);
            return $path.'/'.$imageName;
        }
        return null;
    }
}
