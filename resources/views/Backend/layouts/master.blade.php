<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="developer" content="Tech park it limited, MD. Shefat Ullah, S. M. Mahfujur Rahman">
    <meta name="description" content="Dashboard">
    <meta name="keywords" content="Dashboard">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    {{-- <link rel="stylesheet" href="{{ asset('backend/fonts/source-sans.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('backend/css/overlayscrollbars.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-icons.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">



</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        @include('Backend.layouts.navbar')
        @include('Backend.layouts.sidebar')

        @yield('content')

        @include('Backend.layouts.footer')

    </div>
    <script src="{{ asset('backend/js/overlayscrollbars.browser.es6.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    {{-- <script src="{{ asset('backend/js/popper.min.js') }}"></script> --}}
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
