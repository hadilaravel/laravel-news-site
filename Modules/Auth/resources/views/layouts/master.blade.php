<!DOCTYPE html>
<html lang="en">
<head>
    @include('auth::layouts.head-tag')
    @yield('head-tag')
</head>
<body>

<div class="login-page">
    <div class="form">
        @yield('content')
    </div>
</div>

@yield('script')
</body>
</html>
