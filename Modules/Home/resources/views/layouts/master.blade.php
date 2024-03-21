<!DOCTYPE html>
<html lang="en">
<head>
    @include('home::layouts.head-tag')
    @yield('head-tag')
</head>
<body>

@include('home::layouts.header')

@yield('content')

@include('sweetalert::alert')

@include('home::layouts.footer')
@include('home::layouts.script')
@yield('script')
</body>
</html>
