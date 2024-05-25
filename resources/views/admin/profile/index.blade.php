@extends('admin.layouts.master')

@section('title', 'Admin Profile')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="section-body">
            <!-- Profile Information Section -->
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Profile Information</h4>
                </div>
                <div class="card-body">
                    <p>Update your account's profile information and email address.</p>

                    <form method="post" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('put')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control"
                                   value="{{old('name', auth()->user()->name)}}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control"
                                   value="{{old('email', auth()->user()->email)}}">
                        </div>

                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    <p>Ensure your account is using a long, random password to stay secure.</p>

                    <form method="post" action="{{ route('admin.profile.password.update') }}">
                        @csrf
                        @method('put')

                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="update_password_current_password">Current Password</label>
                            <input id="update_password_current_password" name="current_password"
                                   type="password" class="form-control">
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="update_password_password">New Password</label>
                            <input id="update_password_password" name="password" type="password" class="form-control">
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="update_password_password_confirmation">Confirm Password</label>
                            <input id="update_password_password_confirmation" name="password_confirmation"
                                   type="password" class="form-control">
                        </div>

                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
