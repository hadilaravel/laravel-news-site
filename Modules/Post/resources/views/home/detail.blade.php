@extends('home::layouts.master')
@section('head-tag')
    <title>{{ $post->title }} </title>
@endsection
@section('content')

    <div class="single_post">
        <div class="container-fluid">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="post_img">
                            <img src="{{ $post->postImage() }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="posts_meta text-center">
                     <span style="cursor: pointer" onclick="document.getElementById('formLike').submit()">
                              @if(auth()->check())
                                 <i class="fa fa-{{ auth()->user()->hasLiked($post) ? "heart" : "heart-o" }}"></i>
                                @else
                                 <i class="fa fa-heart-o"></i>
                                @endif
                                 {{ $post->likers()->count() }}
                           <form id="formLike" action="{{ route('post.like' , $post->id) }}" method="post">@csrf</form>
                     </span>
                    <span><i class="fa fa-eye"></i> {{  views($post)->unique()->count() }} تعداد بازدید</span>
                    <span><i class="fa fa-comment-o"></i> {{ $post->activeComments()->count() }} نظر</span>
                    <span><i class="fa fa-archive"></i> {{ $post->category->title }}</span>
                    <span><i class="fa fa-calendar"></i> {{ jdate($post->created_at)->format('Y-m-d')  }}</span>
                </div>
                <div class="post_content">
                    <h4>{{ $post->title }}</h4>
                    <p>
                        {!! $post->body !!}
                    </p>
                    @if($post->isVideoPost())
                    <video style="margin-top: 10px" width="800px" height="500px" controls>
                        <source src="{{ asset($post->video) }}" type="video/mp4">
                        مرورگر شما از ویدیو پشتیبانی نمیکند
                    </video>
                    @endif
                </div>
                <div>
                    <h3>نظرات</h3>
                </div>
                @include('post::home.comments' , ['post' , $post])

            @auth
                <div class="comments_form" style="margin-top: 20px">
                    <h5>دیدگاه شما </h5>
                    <form action="{{ route('home.comments.store' , $post) }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <textarea name="body" class="form-control" placeholder="نظر شما ...">
                                    {{ old('body') }}
                                </textarea>
                                @error('body')
                                <p class="text-danger alert-danger" style="margin-top: 10px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="text-left">
                                    <button class="btn btn-primary">ثبت نظر</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    @endauth
                @guest
                    <div>
                        <p>برای ثبت نطر ابتدا باید
                            <b><a href="{{ route('auth.login') }}"> وارد شوید</a></b>
                        </p>
                    </div>
                @endguest


            </div>
        </div>
    </div>


@endsection
