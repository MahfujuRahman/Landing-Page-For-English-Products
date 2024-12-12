<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="bn" style="font-size: 22px;">
            {{ $about->title ?? 'বৈশিষ্ট্য' }}
        </h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content bn" data-aos="fade-up" data-aos-delay="100">
                @if (isset($about->description_first))
                    {!! $about->description_first !!}
                @endif
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="bn">
                    @if (isset($about->description_second))
                        {!! $about->description_second !!}
                    @endif
                    <a href="{{ $about->button_url ?? '/#order' }}" class="read-more">
                        <span class="bn">
                             {{ $about->button_title ?? 'Order now' }}
                        </span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
