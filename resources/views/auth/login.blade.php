
@extends('layout.authMaster')


@section('title', __('login.title'))

    @section('content')
    <div class="relative" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
        @if(session('success'))
        <span id="alertForAddCart" class="show absolute flex flex-col gap-3" style="top: -1rem; right:20%; z-index:10;">
            <div class="relative p-3 pr-12 text-sm border border-transparent rounded-md text-custom-50 bg-custom-500">
                <button data-alert-close class="absolute top-0 bottom-0 right-0 p-3 transition text-custom-200 hover:text-custom-100">
                    <i data-lucide="x" class="h-5"></i>
                </button>
                <span data-alert-massage-type class="font-bold">Dear user</span>
                <span data-alert-massage-text >{{ session('success') }}</span>
            </div>
        </span>
        @endif

        <div class="absolute hidden opacity-50 ltr:-left-16 rtl:-right-16 -top-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <g id="&lt;Group&gt;">
                    <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50" d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z" />
                    <!-- Additional SVG paths here for decoration -->
                </g>
            </svg>
        </div>

        <div class="absolute hidden -rotate-180 opacity-50 ltr:-right-16 rtl:-left-16 -bottom-10 md:block">
            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 316" width="125" height="316">
                <g id="&lt;Group&gt;">
                    <path id="&lt;Path&gt;" class="fill-custom-100/50 dark:fill-custom-950/50" d="m23.4 221.8l-1.3-3.1v-315.3l1.3 3.1z" />
                    <!-- Additional SVG paths here for decoration -->
                </g>
            </svg>
        </div>

        <div class="mb-0 w-screen lg:mx-auto lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
            <div class="!px-10 !py-12 card-body">

                <div class="mt-8 text-center">
                    <h4 style="color: #e98605" class="mb-1 text-custom-500 dark:text-custom-500">Welcome Back</h4>
                    <p style="color: #dc9539" class="text-slate-500 dark:text-zink-200">Sign in to Continue</p>
                </div>

                <form action="{{ route('login.submit') }}" method="POST" class="mt-10" id="signInForm">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="inline-block mb-2 text-base font-medium">Email</label>
                        <input name="email" value="{{ old('email') }}" type="text" id="email"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter your email address">
                        @error('email')
                        <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                        <input name="password" value="{{ old('password') }}" type="password" id="password"
                               class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                               placeholder="Enter password">
                        @error('password')
                        <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign In</button>
                    </div>

                    <div class="mt-10 text-center">
                        <p class="mb-0 text-slate-500 dark:text-zink-200">Don't have an account? <a href="{{ route('register') }}" class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Sign Up</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


