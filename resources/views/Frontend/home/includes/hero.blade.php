<!-- Hero Section -->
<section id="hero" class="hero section dark-background"
    style="background:url('https://app-area.superb.com.bd/banner/H4ZjT1733734152.jpg');">
    <div class="overlay">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <div>
                        <h1 class="bn" style="font-size: 30px !important;">
                            {{ $banner->title ?? '' }}
                        </h1>
                        <p class="bn text-light">
                            {{ $banner->subtitle ?? '' }}
                        </p>

                        @if ($global_discount > 0)
                            <div id="timer-container" class="text-start mb-4 text-white rounded">
                                <h2 class="mb-2 bangla-font">{{ $global_discount_details['title'] }}</h2>
                                <div id="timer" class="font-monospace bangla-font"></div>
                            </div>
                        @endif

                        <div class="d-flex">
                            <a href="{{ $banner->btn_url_1 }}" class="btn-get-started bn">
                                {{ $banner->btn_title_1 ?? 'Order Now' }}
                            </a>

                            @if ($banner?->btn_url_2)
                                <a href="{{ $banner->btn_url_2 ?? 'https://www.youtube.com/watch?v=BF8iCtSlPEs' }}"
                                    class="glightbox btn-watch-video d-flex align-items-center">
                                    <i class="bi bi-play-circle"></i>
                                    <span>{{ $banner->btn_title_2 ?? 'Watch Video' }}</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if (isset($banner))
                                @foreach ($banner->images as $image)
                                    <div class="carousel-item active " data-bs-interval="3000">
                                        <img src="{{ $image->image ?? '/fcommerce/products/ogi.jpg' }}"
                                            class="d-block w-100 img-fluid animated " alt="Slide image">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        const globalDiscountStartTime = new Date("{{ $global_discount_details['start_time'] }}");
        const globalDiscountEndTime = new Date("{{ $global_discount_details['end_time'] }}");

        function updateTimer() {
            const now = new Date().getTime();
            const timeLeft = globalDiscountEndTime - now;

            if (now < globalDiscountStartTime) {
                document.getElementById("timer").textContent = "Global Discount hasn't started yet!";
                return;
            }

            if (timeLeft <= 0) {
                document.getElementById("timer").textContent = "Global Discount has ended!";
                clearInterval(timerInterval);
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById("timer").textContent =
                `${days.toLocaleString('bn-BD')} দিন
                ${hours.toLocaleString('bn-BD')} ঘন্টা
                ${minutes.toLocaleString('bn-BD')} মিনিট
                ${seconds.toLocaleString('bn-BD')} সেকেন্ড`;
        }

        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer();
    </script>
@endpush
