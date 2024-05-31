@include('layouts.header')
@yield('css')
<div class="main-content">
    @include('layouts.aside')
    <main class="flex-grow-1 p-4">
        @yield('content')
    </main>
</div>
@include('layouts.footer')
@yield('script')
