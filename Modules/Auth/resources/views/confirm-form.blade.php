@extends('auth::layouts.master')
@section('head-tag')
    <title>تاییدیه ایمیل  </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    {!! htmlScriptTagJsApi() !!}
@endsection
@section('content')
    <form class="login-form" action="{{ route('auth.confirm-form.store' , $token) }}" method="post">
        @csrf
        <div>
            ایمیلی را که به
            <b>{{ $email }}</b>
            ارسال شده است را وارد کنید
        </div>
        <input type="text" name="otp_code" value="{{ old('otp_code') }}" placeholder=" کد را وارد کنید"/>
        @error('otp_code')
          <div class="alert alert-danger">
              {{ $message }}
          </div>
        @enderror
        <button> ثبت</button>
        <p class="message"><a href="{{ route('auth.send-email' ,  $token ) }}"> ارسال دوباره کد</a></p>
    </form>
@endsection
