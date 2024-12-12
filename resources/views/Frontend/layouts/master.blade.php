<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="noindex, nofollow">

    <title>
        Super B - Online Ecommerce Shopping
    </title>

    <meta name="keywords"
        content="ecommerce,online shopping, ecommerce, fashion, beauty products, buy online, shop online, secure transactions, wide selection,premium,international,high quality, super, superb,top brand,international brand,quality, expensive,emi,Men&#039;s Varsity Jacket, varsi" />
    <meta name="description"
        content="superb, superb lifestyle, superb.com superb bangladesh, Shop the latest trends at SUPERB, your go-to destination for online fashion and lifestyle shopping. Discover a wide range of products, from clothing to accessories, and enjoy a seamless shopping experience. Elevate your style with SUPERB today." />
    <meta name="author" content="SUPERB" />
    <meta name="copyright" content="SUPERB">
    <meta name="url" content="https://superb.com.bd">

    <meta property="og:title" content=" SUPERB - Online Ecommerce Shopping " />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="https://superb.com.bd" />
    <meta property="og:image" content="https://app-area.superb.com.bd/company_logo/RTruo1730348926.jpg" />
    <meta property="og:site_name" content="SUPERB" />
    <meta property="og:description"
        content="Shop the latest trends at SUPERB, your go-to destination for online fashion and lifestyle shopping. Discover a wide range of products, from clothing to accessories, and enjoy a seamless shopping experience." />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SUPERB - Online Ecommerce Shopping">
    <meta name="twitter:description"
        content="Shop the latest trends at SUPERB, your go-to destination for online fashion and lifestyle shopping. Discover a wide range of products, from clothing to accessories, and enjoy a seamless shopping experience.">
    <meta name="twitter:image" content="https://app-area.superb.com.bd/company_logo/RTruo1730348926.jpg">

    <link href="/logo.png" rel="icon">
    <link href="/logo.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Tiro+Bangla:ital@0;1&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/fcommerce/main.css?v=1.0') }}" rel="stylesheet">
    <link href="{{ asset('frontend/fcommerce/custom.css') }}?v=1.{{ rand(10, 99) }}" rel="stylesheet">


    @stack('styles')
    <script>
        function requestLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        let lat = position.coords.latitude;
                        let lon = position.coords.longitude;
                        fetch(`/set-visitor?lat=${lat}&lon=${lon}`);
                        console.log('Latitude:', position.coords.latitude);
                        console.log('Longitude:', position.coords.longitude);
                    },
                    (error) => {
                        fetch(`/set-visitor`);
                        if (error.code === error.PERMISSION_DENIED) {
                            /* alert(
                                'Location access is denied. Please enable it in your browser settings to use this feature.'
                            ); */
                        } else {
                            console.log('Unable to retrieve location. Please try again.');
                        }
                    }
                );
            } else {

            }
        }
        requestLocation();
    </script>

</head>

<body class="index-page">

    @include('Frontend.layouts.navbar')

    @yield('content')

    @include('Frontend.layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="{{ asset('/frontend/fcommerce/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/aos.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/glightbox.min.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/fcommerce/main.js') }}?v=1.{{ rand(10, 99) }}"></script>

    @stack('scripts')
</body>

</html>
