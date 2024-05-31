<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlideCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SlideCreateRequest $request)
    {
        // Hande image upload
        $imagePath = $this->uploadImage($request, "image");

        // Create a new Slider and save it on db
        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->offer = $request->offer;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        Toastr::success(
            'Slider created successfully.',
            'Success',
            [
                'progressBar' => true,
                "positionClass" => "toast-top-center"
            ]
        );

        return to_route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $slide = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id): RedirectResponse
    {
        $slide = Slider::findOrFail($id);
        $oldImagePath = $slide->image;

        // Upload new image
        $newImagePath = $this->uploadImage($request, 'image', $oldImagePath);

        // Update slider
        $slide->image = !empty($newImagePath) ? $newImagePath : $oldImagePath;
        $slide->title = $request->title;
        $slide->sub_title = $request->sub_title;
        $slide->short_description = $request->short_description;
        $slide->offer = $request->offer;
        $slide->button_link = $request->button_link;
        $slide->status = $request->status;
        $slide->save();

        Toastr::success(
            'Slider updated successfully.',
            'Success',
            [
                'progressBar' => true,
                "positionClass" => "toast-top-center"
            ]
        );

        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slide = Slider::findOrFail($id);
            $this->deleteImage($slide->image);
            $slide->delete();
            return response(['status' => 'success', 'message' => 'Slide deleted successfully.']);
        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => $exception.getMessage()]);
        }
    }
}
