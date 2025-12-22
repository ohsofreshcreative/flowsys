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

<!--- how --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-how -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="__wrapper c-main">
        <div class="">

            <div class="relative grid grid-cols-1 lg:grid-cols-2 items-center b-bottom-s-lighter">
                    <h2 class="m-header">{{ strip_tags($g_how['header']) }}</h2>
                    <p>{{ $g_how['text'] }}</p>
            </div>

            <div id="how-cards" class="__cards grid grid-cols-1 md:grid-cols-[1fr_2fr_1fr] gap-8 mt-16">
                
                <div class="how-images-left relative min-h-80">
                    @foreach ($r_how as $item)
                        @if (!empty($item['image']['url']))
                            <img 
                                class="how-image absolute top-0 left-0 w-full h-full md:h-1/2 object-cover radius transition-opacity duration-300 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}" 
                                src="{{ $item['image']['url'] }}" 
                                alt="{{ $item['image']['alt'] ?? '' }}" 
                                data-index="{{ $loop->index }}"
                            />
                        @endif
                    @endforeach
                </div>

                <div class="how-cards space-y-4">
                    @foreach ($r_how as $item)
                        <div 
                            class="how-card __card relative bg-white hover:bg-primary-lighter radius p-10 cursor-pointer transition-colors {{ $loop->first ? 'active bg-primary' : '' }}"
                            data-index="{{ $loop->index }}"
                        >
                            @if (!empty($item['title']))
                                <h5 class="text-center  pointer-events-none">{{ $item['title'] }}</h5>
                            @endif
                            @if (!empty($item['text']))
                                <p class="text-center pointer-events-none">{{ $item['text'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="how-images-right relative min-h-80">
                    @foreach ($r_how as $item)
                        @if (!empty($item['image2']['url']))
                            <img 
                                class="how-image2 absolute top-0 left-0 w-full h-full md:h-1/2 object-cover radius transition-opacity duration-300 mt-auto bottom-0 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}" 
                                src="{{ $item['image2']['url'] }}" 
                                alt="{{ $item['image2']['alt'] ?? '' }}" 
                                data-index="{{ $loop->index }}"
                            />
                        @endif
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>