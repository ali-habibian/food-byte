{{--
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}


@extends('frontend.home.layouts.master')

@section('title', 'Register')

@section('content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    {{--<section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign up</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>--}}
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        SIGN UP START
    ==========================-->
    <section class="fp__signup" style="background: url({{asset('frontend/images/login_bg.jpg')}});">
        <div class="fp__signup_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class=" container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area mt-4">
                            <h2 class="mb-4">sign up</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input id="name" name="name" type="text" placeholder="Name"
                                                   value="{{old('name')}}" required autofocus autocomplete="name"/>
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input id="email" name="email" type="email" placeholder="Email"
                                                   value="{{old('email')}}" required autocomplete="username"/>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input type="password" id="password" name="password" placeholder="Password"
                                                   required
                                                   autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <input type="password" id="password_confirmation"
                                                   name="password_confirmation"
                                                   required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p class="create_account">Already registered? <a href="{{route('login')}}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN UP END
    ==========================-->
@endsection
