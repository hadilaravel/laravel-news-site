<!DOCTYPE html>
<html lang="en">
<head>
    @include('user::profile.layouts.head-tag')
    @yield('head-tag')
</head>
<body>

@include('user::profile.layouts.header')

@yield('content')

@include('sweetalert::alert')

@include('user::profile.layouts.footer')

@include('user::profile.layouts.script')
@yield('script')
</body>
</html>
