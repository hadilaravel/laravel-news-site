@extends('home::layouts.master')
@section('head-tag')
    <title>مقالات </title>
@endsection
@section('content')

    <div class="latest-posts">
        <div class="container-fluid">
            <div class="blog-title-span">
                <span class="title">اخبار و مقالات</span>
            </div>
            @foreach($posts as $post)
            <div class="col-md-3">
                <div class="post-box">
                    <a href="{{ route('post.details' , $post->slug) }}">
                        <figure>
                            <img src="{{ $post->postImage()) }}" alt="">
                            <figcaption class="meta-fig">
                                <span><i class="fa fa-clock-o"></i> {{  jdate($post->created_at)->format('Y-m-d') }}</span>&nbsp;
                                <span><i class="fa fa-comment-o"></i> 12</span>
                            </figcaption>
                            <figcaption class="view">
                                <span> {{ $post->category->title  }}</span>
                                @if($post->category->parent)
                                <span> {{ $post->category->parent->title  }}</span>
                                @endif
                            </figcaption>
                        </figure>
                        <div class="text-p">
                            <h5>{{ $post->title }}</h5>
                            <p>
                                {{ \Illuminate\Support\Str::limit($post->body , 250) }}
                            </p>
                            <div class="text-rigt">
                                <a href="#">ادامه ...</a></div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
                <div class="col-md-12 text-center">
                    {{ $posts->links() }}
                    {{--                <nav aria-label="Page navigation example">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item"><a class="page-link" href="#">قبلی</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">بعدی</a></li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
            </div>
        </div>
    </div>

@endsection
