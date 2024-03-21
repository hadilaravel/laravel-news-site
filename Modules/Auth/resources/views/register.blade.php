@extends('auth::layouts.master')
@section('head-tag')
    <title>صفحه ثبت نام</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    {!! htmlScriptTagJsApi() !!}
@endsection
@section('content')
    <form class="login-form" action="{{ route('auth.register.store') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="نام شما"/>
        @error('name')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
        @enderror
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
        @error('errorAddress')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button>تکمیل عضویت</button>
        <p class="message">عضو سایت هستید؟ <a href="{{ route('auth.login') }}">وارد شوید</a></p>
    </form>
@endsection
