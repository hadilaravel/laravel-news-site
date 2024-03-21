@extends('home::layouts.master')
@section('head-tag')
    <title>{{ $category->title }} </title>
@endsection
@section('content')

    <div class="latest-posts">
        <div class="container-fluid">
            <div class="col-md-9">
                <div class="blog-title-span">
                    <span class="title">{{ $category->title }}</span>
                </div>
                @include('category::home.posts' , ['categoryPosts' => $category->posts])
            </div>
            <div class="col-md-3 main-content">
                <div class="l-sidebar">
                    @include('home::parts.cat-sidebar' , ['activeCategories' => $categories])
                </div>
{{--                <div class="l-sidebar">--}}
{{--                    <div class="cat-sidebar report">--}}
{{--                        <span class="title">گزارش</span>--}}
{{--                        <div class="text-left"><i class="fa fa-arrows-alt"></i></div>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>--}}
{{--                            <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>--}}
{{--                            <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>--}}
{{--                            <li><a href="#"> اصلی و جوابگوی مورد استفاده قرار گیرد.</a></li>--}}
{{--                            <li><a href="#">متن ساختگی با تولید سادگی نامفهوم متن ساختگی با تولید سادگی نامفهوم--}}
{{--                                    استفاده استفاده</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#"> و سه درصد گذشته با نرم افزارها </a></li>--}}
{{--                            <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>--}}
{{--                            <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>--}}
{{--                            <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>
    </div>


@endsection
