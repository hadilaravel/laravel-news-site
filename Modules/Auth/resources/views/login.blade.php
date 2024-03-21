@extends('auth::layouts.master')
@section('head-tag')
    <title>صفحه ورود</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    {!! htmlScriptTagJsApi() !!}
@endsection
@section('content')
    <form class="login-form" action="{{ route('auth.login.store') }}" method="post">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="پست الکترونیک"/>
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
           @enderror
        <input type="password" value="{{ old('password') }}" name="password" placeholder="رمز عبور"/>
        @error('password')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        @error('error_valid')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button>ورود به ناحیه کاربری</button>
        <p class="message">عضو نیستید؟ <a href="{{ route('auth.register') }}">عضو شوید</a></p>
        <p class="message"> <a style="font-size: 14px" href="{{ route('auth.send-email-password') }}"> بازیابی پسورد</a></p>
    </form>
@endsection
