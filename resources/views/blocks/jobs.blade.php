@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
    $sectionClass .= ' ' . $background;
}

@endphp

<!--- jobs --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-jobs relative -spt {{ $sectionClass }} {{ $section_class }}">
    <div class="__wrapper c-main relative">
        @if (!empty($g_jobs['title']))
            <h2 data-gsap-element="header" class="">{{ $g_jobs['title'] }}</h2>
        @endif

        <div class="__col grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">
            @if($jobs)
                @foreach ($jobs as $sector)
                    <div class="__card bg-white">
                        @if (has_post_thumbnail($sector->ID))
                            <a href="{{ get_permalink($sector->ID) }}">
                                <img src="{{ get_the_post_thumbnail_url($sector->ID, 'large') }}" alt="{{ $sector->post_title }}" class="w-full img-s object-cover rounded-t-2xl">
                            </a>
                        @endif
                        <div class="__content relative bg-white border-p radius p-6" style="margin-top:-32px;">
                            <h6 class="">
                                <a href="{{ get_permalink($sector->ID) }}">{{ $sector->post_title }}</a>
                            </h6>
                            <div class="flex items-center gap-2 mt-2">
                                <img src="/wp-content/uploads/2025/11/place.svg" />{{ get_the_excerpt($sector->ID) }}
                            </div>
                            <a href="{{ get_permalink($sector->ID) }}" class="stroke-btn mt-5">
                               Aplikuj
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>