@include('master.partials.header')

@include('master.partials.sidebar')

<div class="container my-4">
    @yield('content')
</div>

@include('master.partials.footer')
