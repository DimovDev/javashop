<!doctype html>
<html lang="en">
@include('admin.layouts.header')
<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="main-panel">
            @include('admin.layouts.navbar')
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
</body>
    {!! Html::script('assets/js/jquery-1.10.2.js') !!}
    {!! Html::script('assets/js/scripts.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
</html>



