@extends('auth::layouts.master')
@section('head-tag')
    <title>پسورد جدید را وارد کنید</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    {!! htmlScriptTagJsApi() !!}
@endsection
@section('content')
    <form class="login-form" action="{{ route('auth.password-recovery-store' , $token) }}" method="post">
        @csrf
        <input type="password" value="{{ old('password') }}" name="password" placeholder="رمز عبور"/>
        @error('password')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        @if(session('success-password-recovery'))
            <div class="alert alert-success">
                {{ session('success-password-recovery') }}
            </div>
            <p class="message"> <a href="{{ route('auth.login') }}">صفحه ورود </a></p>
        @endif
        <button>ارسال</button>
    </form>
@endsection
