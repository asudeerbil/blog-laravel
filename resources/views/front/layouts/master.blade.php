@if(Route::currentRouteName() !== 'about')
    @include('front.layouts.header')
@endif

@yield('content')
@include('front.layouts.footer')
