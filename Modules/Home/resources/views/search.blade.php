@extends('home::layouts.master')
@section('head-tag')
    <title>{{ $search }}  جستجو برای</title>
@endsection
@section('content')

<div class="latest-posts">
    <div class="container-fluid">
        <div class="col-12">
            <div class="blog-title-span">
                <span class="title">جستجو برای : "{{ $search }}"</span>
            </div>

            @forelse($posts as $post)
                <div class="col-md-3">
                    <div class="post-box">
                        <a href="{{ route('post.details' , $post->slug) }}">
                            <figure>
                                <img src="{{  $post->postImage() }}" alt="">
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
            @empty
                <p>پستی برای جستجو شما پیدا نشد !</p>
            @endforelse

        </div>
{{--        <div class="col-md-3 main-content">--}}
{{--            <div class="top-sidebar-r">--}}
{{--                <span class="title">عکس</span>--}}
{{--                <a href="#">--}}
{{--                    <div class="bx">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="img-box">--}}
{{--                                <figure>--}}
{{--                                    <img src="img/696112501123546.jpg" alt="">--}}
{{--                                    <figcaption><span>1</span></figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="meta">--}}
{{--                                <h5>--}}
{{--                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
{{--                                    گرافیک است. چاپگرها و...</h6>--}}
{{--                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>--}}
{{--                                    <div class="text-left">--}}
{{--                                        <sub><i class="fa fa-comment"></i> 26</sub>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <div class="bx">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="img-box">--}}
{{--                                <figure>--}}
{{--                                    <img src="img/1733753707Capture.png" alt="">--}}
{{--                                    <figcaption><span>2</span></figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 ">--}}
{{--                            <div class="meta">--}}
{{--                                <h5>--}}
{{--                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
{{--                                    گرافیک است. چاپگرها و... متن ارسال شده</h6>--}}
{{--                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>--}}
{{--                                    <div class="text-left">--}}
{{--                                        <sub><i class="fa fa-comment"></i> 26</sub>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <div class="bx">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="img-box">--}}
{{--                                <figure>--}}
{{--                                    <img src="img/290667058azer news.jpg" alt="">--}}
{{--                                    <figcaption><span>3</span></figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 ">--}}
{{--                            <div class="meta">--}}
{{--                                <h5>--}}
{{--                                    عنوان برایلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده--}}
{{--                                    از طراحان گرافیک است. چاپگرها و... شده</h6>--}}
{{--                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>--}}
{{--                                    <div class="text-left">--}}
{{--                                        <sub><i class="fa fa-comment"></i> 26</sub>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <div class="bx">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="img-box">--}}
{{--                                <figure>--}}
{{--                                    <img src="img/parsitarh-1038x515.png" alt="">--}}
{{--                                    <figcaption><span>4</span></figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 ">--}}
{{--                            <div class="meta">--}}
{{--                                <h5>--}}
{{--                                    عنوان برای متن ارسال شده</h6>--}}
{{--                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>--}}
{{--                                    <div class="text-left">--}}
{{--                                        <sub><i class="fa fa-comment"></i> 246</sub>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#">--}}
{{--                    <div class="bx">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="img-box">--}}
{{--                                <figure>--}}
{{--                                    <img src="img/1733753707Capture.png" alt="">--}}
{{--                                    <figcaption><span>2</span></figcaption>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 ">--}}
{{--                            <div class="meta">--}}
{{--                                <h5>--}}
{{--                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
{{--                                    گرافیک است. چاپگرها و... متن ارسال شده</h6>--}}
{{--                                    <span><i class="fa fa-clock-o"></i> 99/3/20</span>--}}
{{--                                    <div class="text-left">--}}
{{--                                        <sub><i class="fa fa-comment"></i> 26</sub>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <div class="l-sidebar">--}}
{{--                <div class="cat-sidebar report">--}}
{{--                    <span class="title">گزارش</span>--}}
{{--                    <div class="text-left"><i class="fa fa-arrows-alt"></i></div>--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>--}}
{{--                        <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>--}}
{{--                        <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>--}}
{{--                        <li><a href="#"> اصلی و جوابگوی مورد استفاده قرار گیرد.</a></li>--}}
{{--                        <li><a href="#">متن ساختگی با تولید سادگی نامفهوم متن ساختگی با تولید سادگی نامفهوم--}}
{{--                                استفاده استفاده</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#"> و سه درصد گذشته با نرم افزارها </a></li>--}}
{{--                        <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>--}}
{{--                        <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>--}}
{{--                        <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-12 text-center">--}}
{{--            <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination">--}}
{{--                    <li class="page-item"><a class="page-link" href="#">قبلی</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">بعدی</a></li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </div>
</div>

@endsection
