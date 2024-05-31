@extends('admin.layouts.master')

@section('title', 'Create Slider')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider Management</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create new slide</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Image Input -->
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose Image</label>
                            <input type="file" name="image" id="image-upload"/>
                        </div>
                    </div>

                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <!-- Sub-Title Input -->
                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" name="sub_title" id="sub_title" class="form-control" required>
                    </div>

                    <!-- Short-Description Input -->
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control"
                                  required></textarea>
                    </div>

                    <!-- Offer Input -->
                    <div class="form-group">
                        <label for="offer">Offer</label>
                        <input type="text" name="offer" id="offer" class="form-control">
                    </div>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="button_link">Link</label>
                        <input type="text" name="button_link" id="button_link" class="form-control">
                    </div>

                    <!-- Status Input -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create</button>
                    <!-- Status Input -->
                </form>
            </div>
        </div>
    </section>
@endsection
