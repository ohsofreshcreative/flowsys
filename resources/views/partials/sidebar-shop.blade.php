{{--
|--------------------------------------------------------------------------
| Plik częściowy dla Sidebara Sklepu
|--------------------------------------------------------------------------
| Ten plik jest wczytywany warunkowo przez główny szablon archiwum.
| Jego zadaniem jest zdefiniowanie sekcji @sidebar i wypełnienie jej
| widżetami z naszego nowego obszaru 'sidebar-shop-filters'.
|--------------------------------------------------------------------------
--}}

{{-- Ustawiamy zmienną, którą odczyta główny layout (app.blade.php) --}}
@php $sidebar_position = 'left' @endphp

{{-- Definiujemy sekcję @sidebar i wypełniamy ją widżetami --}}
@section('sidebar')
  @php dynamic_sidebar('sidebar-shop-filters') @endphp
@endsection