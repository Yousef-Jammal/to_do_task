
<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Icons CSS -->
    

    
    @livewireStyles


    

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('/css/tailwind2.css') }}">

</head>

<body class="text-base bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700">
<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">

    
    
    <x-sidebar  />


    <x-header  />
    
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    @yield('content')
    


    <x-footer />
    </div>

</div>
<!-- end main content -->



@yield('modals')

<div class="fixed items-center hidden bottom-6 right-12 h-header group-data-[navbar=hidden]:flex">
    <button data-drawer-target="customizerButton" type="button" class="inline-flex items-center justify-center w-12 h-12 p-0 transition-all duration-200 ease-linear rounded-md shadow-lg text-sky-50 bg-sky-500">
        <i data-lucide="settings" class="inline-block w-5 h-5"></i>
    </button>
</div>



@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    {{-- <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>lucide.createIcons();</script> --}}

<!-- Sweetalert2 -->


<script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ asset('libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('libs/lucide/umd/lucide.js') }}"></script>
<script src="{{ asset('js/tailwick.bundle.js') }}"></script>
<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>



</body>

</html>