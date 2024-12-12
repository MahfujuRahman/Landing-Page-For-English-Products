<aside class="app-sidebar bg-body-secondary " data-bs-theme="dark">
    <div class="sidebar-brand logo_background">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('frontend/fcommerce/logo_big.png') }}" alt="Admin" class="brand-image opacity-75 shadow">
            {{-- <span class="brand-text fw-light">Admin Panel</span> --}}
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p> Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('website.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-globe"></i>
                        <p> Website </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-image"></i>
                        <p> Banner </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('video.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-camera-video"></i>
                        <p> Video </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-info-circle"></i>
                        <p> About </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('image-gallery.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-images"></i>
                        <p> Image Gallery </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-box"></i>
                        <p> Product </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-list-check"></i>
                        <p> Order List </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('global-discounts.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-percent"></i>
                        <p> Global Discount </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('coupons.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-ticket"></i>
                        <p> Coupons </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setting') }}" class="nav-link">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p> Setting </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').find('a').each(function() {
                $(this).toggleClass('active', $(this).attr('href') == window.location.pathname);
            });
        });
        document.querySelector(`a[href="${location.href}"]`).classList.add('active')

    </script>

@endpush
