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

<!--- sectors --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-sectors relative -spt {{ $sectionClass }} {{ $section_class }}">
    <div class="__wrapper c-main relative">
        @if (!empty($g_sectors['title']))
            <h2 data-gsap-element="header" class="">{{ $g_sectors['title'] }}</h2>
        @endif

        <div class="__col grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            @if($sectors)
                @foreach ($sectors as $sector)
                    <div class="__card bg-white">
                        @if (has_post_thumbnail($sector->ID))
                            <a href="{{ get_permalink($sector->ID) }}">
                                <img src="{{ get_the_post_thumbnail_url($sector->ID, 'large') }}" alt="{{ $sector->post_title }}" class="w-full img-s object-cover rounded-t-2xl">
                            </a>
                        @endif
                        <div class="__content relative flex flex-col bg-white border-p radius min-h-auto lg:min-h-[244px] p-6" style="margin-top:-32px;">
                            <h5 class="">
                                <a href="{{ get_permalink($sector->ID) }}">{{ $sector->post_title }}</a>
                            </h5>
                            <div class="pb-4">
                                {{ get_the_excerpt($sector->ID) }}
                            </div>
                           <!--  <a href="{{ get_permalink($sector->ID) }}" class="underline-btn mt-auto">
                                Dowiedz się więcej
                            </a> -->
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>