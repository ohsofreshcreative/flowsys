@php
// Pobieramy dane z globalnej strony opcji 'bottom'
$bottom = get_field('bottom', 'option');
$flip = get_field('flip', 'option');
$section_id = get_field('section_id', 'option');
$section_class_from_options = get_field('section_class', 'option');

// Budujemy klasy CSS
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= ' ' . $section_class_from_options; // Dodajemy klasy z opcji

// Sprawdzamy, czy mamy co wyświetlić
if (!$bottom) {
    return;
}
@endphp

<!-- bottom-block -->
<section data-gsap-anim="section" @if($section_id) id="{{ $section_id }}" @endif class="s-bottom-block relative overflow-hidden -smt bg-dark {{ $sectionClass }} {{ $section_class }}">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center">

        <div class="__content w-11/12 md:w-3/4 lg:w-1/2 py-20 m-auto">
            <h4 data-gsap-element="header" class="text-white mt-4">{{ $bottom['title'] }}</h4>
            <div data-gsap-element="txt" class="mt-2 text-white">
                {!! $bottom['txt'] !!}
            </div>

            <div data-gsap-element="form" class="mt-8">
                {!! do_shortcode($bottom['shortcode']) !!}
            </div>
        </div>

        <div class="__img inset-y-0 h-full aspect-square">
            <svg
                viewBox="0 0 100 100"
                class="block h-full w-auto"
                role="img"
                aria-label="{{ $bottom['image']['alt'] ?? '' }}">
                <title>{{ $bottom['image']['alt'] ?? '' }}</title>

                <defs>
                    <mask id="ringMask">
                        <rect width="100%" height="100%" fill="black" />
                        <circle cx="50" cy="50" r="50" fill="white" />
                        <circle cx="50" cy="50" r="20" fill="black" />
                    </mask>
                </defs>

                <image
                    href="{{ $bottom['image']['url'] }}"
                    x="0" y="0" width="100%" height="100%"
                    preserveAspectRatio="xMidYMid slice"
                    mask="url(#ringMask)" />
            </svg>
        </div>

    </div>
</section>