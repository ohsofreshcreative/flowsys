@extends('layouts.app')

@section('content')
  <main id="main" class="main c-main -spt">

    @php
      if (function_exists('woocommerce_breadcrumb')) {
        woocommerce_breadcrumb();
      }
    @endphp
    <header class="woocommerce-products-header grid grid-cols-1 md:grid-cols-2 gap-6">
      @if(apply_filters('woocommerce_show_page_title', true))
        <h1 class="woocommerce-products-header__title page-title text-h3">{!! woocommerce_page_title(false) !!}</h1>
      @endif
      @php do_action('woocommerce_archive_description') @endphp
    </header>

    <div class="flex flex-wrap lg:flex-nowrap gap-x-8 mt-10">
     <!--  <aside class="sidebar w-full lg:w-1/4 order-first">
        @php dynamic_sidebar('sidebar-shop') @endphp
      </aside> -->

      <div class="products-wrapper w-full">
        @if(woocommerce_product_loop())
          @php
            do_action('woocommerce_before_shop_loop');
            woocommerce_product_loop_start(false);
          @endphp

          <ul class="products_grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(wc_get_loop_prop('total'))
              @while(have_posts())
                @php the_post(); wc_get_template_part('content', 'product'); @endphp
              @endwhile
            @endif
          </ul> 

          @php
            woocommerce_product_loop_end(false);
            do_action('woocommerce_after_shop_loop');
          @endphp
        @else
          @php do_action('woocommerce_no_products_found') @endphp
        @endif
      </div>
    </div>

    @php do_action('woocommerce_after_main_content') @endphp
  </main>
@endsection