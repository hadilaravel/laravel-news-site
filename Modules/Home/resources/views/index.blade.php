@extends('home::layouts.master')
@section('head-tag')
    <title>صفحه اصلی</title>
@endsection
@section('content')

    <div class="clear-fix"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('home::parts.most-views' , ['postMostViews' => $postMostViews])
            </div>
            <div class="col-md-6">
                @include('home::parts.main-slider' , ['vipSliderPosts' => $vipSliderPosts])
            </div>
            <div class="col-md-3">
              @include('home::parts.comments' , ['latestComments' => $latestComments])
            </div>
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="r-sidebar">
                        <div class="special-posts">
                            <span class="title">گفتگو</span><br>
                            <div class="special-box">
                                <a href="#">
                                    <figure>
                                        <img src="img/1397022612335447514155694.jpg" alt="">
                                        <figcaption class="txt">
                                            <h4>عنوان مطلب ارسالی</h4>
                                            <span><i class="fa fa-calendar-o"></i> 99/3/20</span>
                                            <span><i class="fa fa-comment-o"></i> 98</span>
                                        </figcaption>
                                        <figcaption class="link"><i class="fa fa-external-link"></i></figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="special-box">
                                <a href="#">
                                    <figure>
                                        <img src="img/unnamed.jpg" alt="">
                                        <figcaption class="txt">
                                            <h4>که لازم است و برای شرایط فعلی تکنولوژی مور</h4>
                                            <span><i class="fa fa-calendar-o"></i> 99/3/20</span>
                                            <span><i class="fa fa-comment-o"></i> 98</span>
                                        </figcaption>
                                        <figcaption class="link"><i class="fa fa-external-link"></i></figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="special-box">
                                <a href="#">
                                    <figure>
                                        <img src="img/696112501123546.jpg" alt="">
                                        <figcaption class="txt">
                                            <h4>لازمه توجه به نشریات در اینترنت</h4>
                                            <span><i class="fa fa-calendar-o"></i> 99/3/20</span>
                                            <span><i class="fa fa-comment-o"></i> 98</span>
                                        </figcaption>
                                        <figcaption class="link"><i class="fa fa-external-link"></i></figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="special-box">
                                <a href="#">
                                    <figure>
                                        <img src="img/parsitarh-1038x515.png" alt="">
                                        <figcaption class="txt">
                                            <h4>یک عنوان برای این بخش نظر بگیرید ، این عنوا اگر بسیار بلند هم باشد توسط
                                                خود قالب بهینه خواهد شد
                                            </h4>
                                            <span><i class="fa fa-calendar-o"></i> 99/3/20</span>
                                            <span><i class="fa fa-comment-o"></i> 98</span>
                                        </figcaption>
                                        <figcaption class="link"><i class="fa fa-external-link"></i></figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                       @include('home::parts.ads-box' , ['activeAdvertisings' => $activeAdvertisings])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-wrapper">
                        <div class="most-views">
                            <span class="title"> آخرین مطلب</span>
                            <div class="col-md-8">
                                <div class="main-post">
                                    <a href="#">
                                        <figure>
                                            <img src="img/290667058azer news.jpg" alt="">
                                            <figcaption>
                                                <span><i class="fa fa-folder-o"></i> خبر روز</span>
                                                <h3>ایپسوم متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت</h3>
                                                <span><i class="fa fa-comments-o"></i> 65</span>
                                            </figcaption>
                                        </figure>
                                        <div class="p-div">
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که
                                                لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و...
                                            </p>
                                        </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <div class="oth-posts">
                                    <div class="r-box">
                                        <span class="cat-span">آموزشی</span>
                                        <span class="cat-span">#خبر</span>
                                        <a href="#">
                                            <h5>که لازم است و برای شرایط فعلی تکنولوژی مور</h5>
                                        </a>
                                        <span><i class="fa fa-clock-o"></i> 3 دی 98</span>
                                    </div>
                                    <div class="r-box">
                                        <span class="cat-span">آموزشی</span>
                                        <span class="cat-span">#خبر</span>
                                        <a href="#">
                                            <h5>که لازم است و برای شرایط فعلی تکنولوژی مور</h5>
                                        </a>
                                        <span><i class="fa fa-clock-o"></i> 3 دی 98</span>
                                    </div>
                                    <div class="r-box">
                                        <span class="cat-span">آموزشی</span>
                                        <span class="cat-span">#خبر</span>
                                        <a href="#">
                                            <h5>که لازم است و برای شرایط فعلی تکنولوژی مور</h5>
                                        </a>
                                        <span><i class="fa fa-clock-o"></i> 3 دی 98</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="special-cat-box">
                            <span class="title">فیلم و ویدئو</span>
                            @include('home::parts.postVideos')
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="l-sidebar">
                        <div class="cat-sidebar report">
                            <span class="title">گزارش</span>
                            <div class="text-left"><i class="fa fa-arrows-alt"></i></div>
                            <ul>
                                <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>
                                <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>
                                <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>
                                <li><a href="#"> اصلی و جوابگوی مورد استفاده قرار گیرد.</a></li>
                                <li><a href="#">متن ساختگی با تولید سادگی نامفهوم متن ساختگی با تولید سادگی نامفهوم
                                        استفاده استفاده</a>
                                </li>
                                <li><a href="#"> و سه درصد گذشته با نرم افزارها </a></li>
                                <li><a href="#">لورم ایپسو استفاده از طراحان</a></li>
                                <li><a href="#">و سه درصد می طلبد تا با نرم افزارها ش</a></li>
                                <li><a href="#"> فارسی ایجاد کرد. در ارائه راهکارها</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="l-sidebar">
                        @include('home::parts.cat-sidebar' , ['activeCategories' => $activeCategories])
                    </div>
                </div>
            </div>
        </div>
        <div class="clear-fix"></div>
        <div class="latest-posts">
            @include('home::parts.latest-posts' , ['latestPosts' => $latestPosts])
        </div>
    </div>

@endsection
