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

<!--- what --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-what -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="__wrapper c-main">

        <div class="__top w-full md:w-1/2 mx-auto">
            <h3 data-gsap-element="header" class="text-center">{{ strip_tags($g_what['header']) }}</h3>
            <p data-gsap-element="txt" class="text-center mt-3">{{ $g_what['text'] }}</p>
        </div>

        @if (!empty($r_what))
            @php
                $itemCount = count($r_what);
                $half = ceil($itemCount / 2);
                $leftItems = array_slice($r_what, 0, $half);
                $rightItems = array_slice($r_what, $half);
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10 items-center">
           
               <div class="flex flex-col gap-8 order-2 lg:order-1">
                    @foreach ($leftItems as $item)
                        <div data-gsap-element="stagger" class="__card relative bg-primary radius p-8">
                            @if (!empty($item['points']))
                                <div class="flex gap-1 text-white font-medium">
                                    <span class="">{{ $loop->iteration }}.</span>
                                    <p class="">{{ $item['points'] }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if (!empty($g_what['image']))
                    <div data-gsap-element="img" class="__img h-full order-1 lg:order-2">
                        <img class="object-cover w-full h-full __img radius-img" src="{{ $g_what['image']['url'] }}" alt="{{ $g_what['image']['alt'] ?? '' }}">
                    </div>
                @endif

                <div class="flex flex-col gap-8 order-2 lg:order-3">
                    @foreach ($rightItems as $item)
                        <div data-gsap-element="stagger" class="__card relative bg-primary radius p-8">
                            @if (!empty($item['points']))
                                <div class="flex gap-1 text-white font-medium">
                                    <span class="">{{ $loop->iteration + $half }}.</span>
                                    <p class="">{{ $item['points'] }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>