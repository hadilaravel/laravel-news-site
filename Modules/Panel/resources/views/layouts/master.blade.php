<!DOCTYPE html>
<html>
<head>
  @include('panel::layouts.head-tag')
    @yield('head-tag')
</head>
<body dir="rtl">


@include('panel::layouts.header')

<section class="body-container">

    @include('panel::layouts.sidebar')

    <section id="main-body" class="main-body">

        @yield('content')

    </section>

    @include('sweetalert::alert')


</section>



    @include('panel::layouts.script')
    @yield('script')
</body>
