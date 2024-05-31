<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlideCreateRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\View;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
