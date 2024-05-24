{{--<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}

@extends('frontend.home.layouts.master')

@section('title', 'Reset Password')

@section('content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <!--
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign in</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    -->
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        RESET PASSWORD START
    ==========================-->
    <section class="fp__signin" style="background: url({{asset('frontend/images/login_bg.jpg')}});">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area mt-4">
                            <h2 class="mb-4">Welcome back!</h2>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <div class="row">
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email Address -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input id="email" name="email" type="email" placeholder="Email" required
                                                   autocomplete="username" value="{{old('email', $request->email)}}">
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input id="password" name="password" type="password" placeholder="New Password"
                                                   required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password"
                                                   required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account">Don't have an account ? <a href="{{route('register')}}">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        RESET PASSWORD END
    ==========================-->
@endsection
