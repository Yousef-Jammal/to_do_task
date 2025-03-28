@extends('layout.authMaster')

@section('title', __('register.title'))

@section('content')
    <div class="relative" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
        <div class="absolute hidden opacity-50 ltr:-left-16 rtl:-right-16 -top-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <!-- SVG decoration paths here -->
            </svg>
        </div>

        <div class="absolute hidden -rotate-180 opacity-50 ltr:-right-16 rtl:-left-16 -bottom-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <!-- SVG decoration paths here -->
            </svg>
        </div>

        <div class="mb-0 w-screen lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
            <div class="!px-10 !py-12 card-body">

                <div class="mt-8 text-center">
                    <h4 style="color: #e98605" class="mb-1 text-custom-500 dark:text-custom-500">Create Your Account</h4>
                </div>

                <form action="{{ route('register.submit') }}" method="post" class="mt-10" id="registerForm">
                    @csrf
                    <div class="mb-3">
                        <label for="username-field" class="inline-block mb-2 text-base font-medium">Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" id="username-field"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter your name">
                        @error('name')
                        <div id="username-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="inline-block mb-2 text-base font-medium">Email</label>
                        <input name="email" value="{{ old('email') }}" type="text" id="email-field"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter your email address">
                        @error('email')
                        <div id="email-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                        <input name="password" value="{{ old('password') }}" type="password" id="password"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter password">
                        @error('password')
                        <div id="password-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="conf_password" class="inline-block mb-2 text-base font-medium">Confirm Password</label>
                        <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" id="conf_password"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Re-enter password">
                        @error('password_confirmation')
                        <div id="conf_password-error" class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-10">
                        <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign Up</button>
                    </div>

                    <div class="mt-10 text-center">
                        <p class="mb-0 text-slate-500 dark:text-zink-200">Already have an account? <a href="{{ route('login') }}" class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<!-- Optional JavaScript if needed -->
@endsection
