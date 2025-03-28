@php
    $notification_count = \App\Models\Notification::where('user_id', Auth::user()->id)->where('is_read', 0)->count();
    $notification_list = \App\Models\Notification::where('user_id', Auth::user()->id)->where('is_read', 0)->get();
@endphp

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

    




    <header id="page-topbar" class=" group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm group-data-[layout=horizontal]:ltr:left-0 group-data-[layout=horizontal]:rtl:right-0 fixed right-0 z-[1000] left-0 print:hidden group-data-[navbar=bordered]:m-4 group-data-[navbar=bordered]:[&.is-sticky]:mt-0 transition-all ease-linear duration-300 group-data-[navbar=hidden]:hidden group-data-[navbar=scroll]:absolute group/topbar group-data-[layout=horizontal]:z-[1004]">
        <div class="layout-width">
            <div class="flex items-center px-4 mx-auto bg-topbar border-b-2 border-topbar group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-brand shadow-md h-header shadow-slate-200/50 group-data-[navbar=bordered]:rounded-md group-data-[navbar=bordered]:group-[.is-sticky]/topbar:rounded-t-none group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:border-zink-700 dark:shadow-none group-data-[topbar=dark]:group-[.is-sticky]/topbar:dark:shadow-zink-500 group-data-[topbar=dark]:group-[.is-sticky]/topbar:dark:shadow-md group-data-[navbar=bordered]:shadow-none group-data-[layout=horizontal]:group-data-[navbar=bordered]:rounded-b-none group-data-[layout=horizontal]:shadow-none group-data-[layout=horizontal]:dark:group-[.is-sticky]/topbar:shadow-none">
                <div class="flex items-center w-full group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl navbar-header group-data-[layout=horizontal]:ltr:xl:pr-3 group-data-[layout=horizontal]:rtl:xl:pl-3">
                    <!-- LOGO -->
                    <div class="items-center justify-center  px-5 text-center h-header group-data-[layout=horizontal]:md:flex group-data-[layout=horizontal]:ltr::pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                        <a href="index.html" class=" group-data-[topbar=dark]:block group-data-[topbar=brand]:block">
                            <span class="group-data-[topbar=dark]:block group-data-[topbar=brand]:block">
                                <h1>TO DO</h1>
                            </span>
                        </a>
                    </div>
    
                    <div class="flex gap-3 ms-auto">
    
                        <div class="relative flex items-center dropdown h-header">
                            <button type="button" class="inline-flex justify-center relative items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark" id="notificationDropdown" data-bs-toggle="dropdown">
                                <i data-lucide="bell-ring" class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                                
                                <span id="blue-dot" class="absolute top-0 right-0 flex w-1.5 h-1.5 @if($notification_count <= 0) hidden @endif">
                                    <span class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-sky-400"></span>
                                    <span class="relative inline-flex w-1.5 h-1.5 rounded-full bg-sky-500"></span>
                                </span>
                                
                            </button>
                            <div class="absolute z-50 hidden ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[20rem] lg:min-w-[26rem] dark:bg-zink-600" aria-labelledby="notificationDropdown">
                                <div class="p-4">
                                    <h6 class="mb-4 text-16">Notifications <span id="notifications-count" class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-orange-500 border-orange-500">{{ $notification_count }}</span></h6>
                                </div>
                                <div data-simplebar class="max-h-[350px]">
                                    <div class="flex flex-col gap-1" id="notification-list">
                                        @foreach ($notification_list  as $notification)
                                            <a href="#!" class=" gap-3 p-4 product-item hover:bg-slate-50 dark:hover:bg-zink-500 follower grow">
                                                <h6 class="mb-1 font-medium"><b>New Task:</b> {{ $notification->task->title }}</h6>
                                                <p class="mb-0 text-sm text-slate-500 dark:text-zink-300"><span class="align-middle">{{ \Carbon\Carbon::parse($notification->created_at)->format('F j, Y') }}</span></p>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
    

    
                        <div class="relative flex items-center dropdown h-header">
                            <button type="button" class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <div class="bg-pink-100 rounded-full">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAmCAYAAACoPemuAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDYuMC1jMDAyIDc5LjE2NDM1MiwgMjAyMC8wMS8zMC0xNTo1MDozOCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIxLjEgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjdEM0Q3M0Q0OEE3MjExRUU5QzY1Qjg0RTZGNUJCMkJGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdEM0Q3M0Q1OEE3MjExRUU5QzY1Qjg0RTZGNUJCMkJGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6N0QzRDczRDI4QTcyMTFFRTlDNjVCODRFNkY1QkIyQkYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6N0QzRDczRDM4QTcyMTFFRTlDNjVCODRFNkY1QkIyQkYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz70YlHmAAAK6UlEQVR42sxYaWxc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" alt="" class="w-[37.5px] h-[37.5px] rounded-full">
                                </div>
                            </button>
                            <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                                <a href="#!" class="flex gap-3 mb-3">
                                    <div>
                                        <h6 class="mb-1 text-15">{{ auth()->user()->name }}</h6>
                                    </div>
                                </a>
                                <ul>
                                    <li class="pt-2 mt-2 border-t border-slate-200 dark:border-zink-500">
                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf
                                            <button type="submit" class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500">
                                                <i data-lucide="log-out" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Sign Out
                                            </button>
                                        </form>    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    



    
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

    

        <div class="group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Tasks user</h5>
                    </div>
                </div>

                @livewire('tasks-table')
                


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




    


        <footer class=" group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
            <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
                <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                    <div>
                        <script>document.write(new Date().getFullYear())</script> © Tailwick.
                    </div>
                    <div class="hidden lg:block">
                        <div class="ltr:text-right rtl:text-left">
                            Design & Develop by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>  

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

<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ asset('libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('libs/lucide/umd/lucide.js') }}"></script>
<script src="{{ asset('js/tailwick.bundle.js') }}"></script>
<!-- App js -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}



</body>

</html>



