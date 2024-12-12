<!-- Services Section -->
<section id="services" class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="bn">
            {{ $image_gallery->title ?? 'Gallery' }}
        </h2>
        <p class="bn">
            {{ $image_gallery->subtitle ?? '' }}
        </p>
    </div><!-- End Section Title -->
    <div class="container pb-5">
        <div class="row gy-4">
            @if (isset($image_gallery))
                @foreach ($image_gallery->images as $item)
                    <div class="col-6 col-lg-4 d-flex">
                        <div class="service-item position-relative p-2">
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="image">
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            @endif

            <div class="col-12">
                <div class="text-center pt-5">
                    <a href="{{ $image_gallery->btn_url ?? '/#order' }}" class="bn btn btn-info">
                        {{ $image_gallery->btn_title ?? 'Order now' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
