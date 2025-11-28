<article @php(post_class('__card bg-white'))>
    @if (has_post_thumbnail())
        <a class="block rounded-t-2xl overflow-hidden" href="{{ get_permalink() }}">
            <img src="{{ get_the_post_thumbnail_url(null, 'large') }}" alt="{{ get_the_title() }}" class="w-full img-s object-cover">
        </a>
    @endif
    <div class="__content relative bg-white border-p radius p-6" style="margin-top:-32px;">
        <h6 class="">
            <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
        </h6>
       <!--  <div class="mt-2">
            @php(the_excerpt())
        </div> -->
        <a href="{{ get_permalink() }}" class="underline-btn mt-4">
            Dowiedz się więcej
        </a>
    </div>
</article>