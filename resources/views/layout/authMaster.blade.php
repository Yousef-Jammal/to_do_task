
    <!DOCTYPE html>
    <html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

    <head>

        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta content="Minimal Admin & Dashboard Template" name="description">
        <meta content="Themesdesign" name="author">
        <!-- App favicon -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
        <!-- Layout config Js -->
        <script src="{{ asset('js/layout.js') }}"></script>
        <!-- Icons CSS -->

        <style>
            body{
                margin: 0;
                /* overflow: hidden; */
                width: 100%;
                height: 100%;
            }
            #alertForAddCart {
                opacity: 0;
                transform: translateX(220%);
                transition: all 0.3s ease;
            }

            #alertForAddCart.show {
                opacity: 1;
                transform: translateX(0);
            }
        </style>

        <!-- Tailwind CSS -->


    <link rel="stylesheet" href="{{ asset('css/tailwind2.css') }}">
    </head>

    <body class="flex items-center justify-center min-h-screen py-16 lg:py-10 bg-slate-50 dark:bg-zink-800 dark:text-zink-100 font-public">

    @yield('content')


    <script src='{{ asset("libs/choices.js/public/assets/scripts/choices.min.js") }}'></script>
    <script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/prismjs/prism.js') }}"></script>

    <script src="{{ asset('libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('js/tailwick.bundle.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alertElement = document.getElementById('alertForAddCart');
            const closeButton = alertElement.querySelector('[data-alert-close]');

            // Show the alert with animation
            if (alertElement.classList.contains('show')) {
                setTimeout(() => {
                    alertElement.classList.remove('show');
                }, 3000); // Hide after 5 seconds
            }

            // Allow manual closing of the alert
            closeButton.addEventListener('click', () => {
                alertElement.classList.remove('show');
            });
        });
    </script>

    @yield('script')



</body>

</html>
