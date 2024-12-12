@push('styles')
<style>
    .video_section {
        margin: 0;
    }

    .hero_video {
        position: relative;
        overflow: hidden;
        margin: 0;
        height: calc(100vh - 20vh);
        width: calc(100vw - 20vw);
        margin: auto;
    }

    .hero_video::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .hero_video .container-fluid {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .hero_video h1 {
        color: #fff;
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .hero_video .btn-watch-video {
        color: #fff;
        font-size: 1.2rem;
        text-decoration: none;
        transition: color 0.3s ease;
        border: 1px solid rgb(235, 233, 233);
        padding: 10px 20px;
        border-radius: 5px;
    }

    .hero_video .btn-watch-video:hover {
        border: 1px solid rgb(0, 217, 255);
        padding: 10px 20px;
        border-radius: 5px;
    }

    @media (max-width: 1024px) {
        .hero_video h1 {
            font-size: 2.5rem;
        }

        .hero_video .btn-watch-video {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .hero_video {
            height: 50vh  !important;
            min-height: 0 !important;
        }

        .hero_video h1 {
            font-size: 2rem;
        }

        .hero_video .btn-watch-video {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .hero_video {
            height: 40vh;
        }

        .hero_video h1 {
            font-size: 1.5rem;
        }

        .hero_video .btn-watch-video {
            font-size: 0.9rem;
        }
    }
</style>

@endpush

<!-- Hero Section -->
<section id="hero" class="hero_section video_section">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="bn">
            {{ $video->title ?? 'ডেমো ভিডিও' }}
        </h2>
         <p>{{ $video->sub_title ?? '' }}</p>
    </div>

    <!-- Hero Background Image Section -->
    <div class="hero hero_video"
        style="background: url('{{ $video->image ?? 'https://i0.wp.com/picjumbo.com/wp-content/uploads/autumn-background-with-space-for-text-and-leaves-around-free-image.jpeg?w=600&quality=80' }}') no-repeat center center; background-size: cover;">
        <div class="container-fluid">
            <a href="{{ $video->button_url ?? '#' }}"
                class="glightbox btn-watch-video d-flex align-items-center">
                <i class="bi bi-play-circle me-2"></i>
                <span>{{ $video->button_title ?? 'Watch Video' }}</span>
            </a>
        </div>
    </div>
</section>
