@extends('auth::layouts.master')
@section('head-tag')
    <title>صفحه ایمیل برای ارسال پسورد</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    {!! htmlScriptTagJsApi() !!}
@endsection
@section('content')
    <form class="login-form" action="{{ route('auth.send-email-password-store') }}" method="post">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="پست الکترونیک"/>
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
           @enderror
        @if(session('success-send-email'))
        <div class="alert alert-success">
            {{ session('success-send-email') }}
        </div>
        @endif
        <button>ارسال</button>
        <p class="message"> <a href="{{ route('auth.login') }}">بازگشت </a></p>
    </form>
@endsection
