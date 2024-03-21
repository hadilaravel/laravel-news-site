@extends('user::profile.layouts.master')
@section('content')

    <main >
        <div class="container-fluid" style="height: 800px">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <!-- navigation side bar + tab -->
                    <ul class="nav nav-pills nav-pills-success nav-stacked">
                        <li class="active"><a data-toggle="pill" href="#about">بیوگرافی</a></li>
{{--                        <li><a data-toggle="pill" href="#subset">گالری تصاویر</a></li>--}}
                        <li><a data-toggle="pill" href="#adventures">مقالات</a></li>
                        <li><a data-toggle="pill" href="#contact">ویرایش پروفایل</a></li>
                    </ul>

                    <!-- recent activity -->
{{--                    <div  >--}}
{{--                        <h4>رویداد ها </h4>--}}
{{--                        <ul>--}}
{{--                            <li> شما یک نظر از طرف <a class="text-success">احمد</a> دارید.</li>--}}
{{--                            <li> شما یک نظر از طرف <a class="text-success">احمد</a> دارید.</li>--}}
{{--                            <li> شما یک نظر از طرف <a class="text-success">احمد</a> دارید.</li>--}}
{{--                            <li> شما یک نظر از طرف <a class="text-success">احمد</a> دارید.</li>--}}
{{--                            <li> شما یک نظر از طرف <a class="text-success">احمد</a> دارید.</li>--}}
{{--                        </ul>--}}
{{--                        <a class="text-success more2">بیشتر</a>--}}
{{--                    </div>--}}
                </div>
                <!-- start tab content -->
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="tab-content">
                        <!-- about -->
                        <div id="about" class="tab-pane fade in active">
                            <h3>بیوگرافی</h3>
                            <p><span><i class="fa fa-user-circle"></i><strong>نام:</strong></span> {{ auth()->user()->name }} </p>
{{--                            <p><span><i class="fa fa-user-circle-o"></i><strong>نام کاربری :</strong></span> نام کاربری </p>--}}
{{--                            <p><span><i class="fa fa-calendar"></i><strong>تاریخ تولد :</strong></span> 1/1/98 </p>--}}
                            <p><span><i class="fa fa-envelope"></i><strong>پست الکترونیک :</strong></span> {{ auth()->user()->email }} </p>
{{--                            <p><span><i class="fa fa-map-marker"></i><strong>آدرس :</strong></span> ایران | شبراز </p>--}}
{{--                            <p><span><i class="fa fa-phone"></i><strong>تلفن تماس :</strong></span> 07132309534 </p>--}}
                        </div>
                        <!-- adventures and blog -->
                        <div id="adventures" class="tab-pane fade">
                            <h3>مقالات</h3>
                            @forelse($posts as $post)
                            <h4><i class="fa fa-pencil"></i> {{ $post->title }} </h4>
                            <p>{{ \Illuminate\Support\Str::limit($post->body , 120) }}</p>
                                @empty
                                    <p>مقاله ای وجود ندارد</p>
                            @endforelse
                        </div>

                        <!-- subset -->
{{--                        <div id="subset" class="tab-pane fade">--}}
{{--                            <h3>گالری تصاویر</h3>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-4 col-xs-4">--}}
{{--                                    <div class="thumbnail">--}}
{{--                                        <img src="pics/chopper.jpg">--}}
{{--                                        <div class="caption">--}}
{{--                                            <p>صوفی <small>(jpg)</small><p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <!-- contact form -->
                        <div id="contact" class="tab-pane fade">
                            <h3>ویرایش پروفایل</h3>
                            <div class="card card-signup">
                                <form class="form" method="post" action="{{ route('user.profile.edit' , auth()->id()) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="content">
                                        <div class="input-group">
											 <span class="input-group-addon">
												<i class="fa fa-user-circle"></i>نام
											 </span>
                                            <input type="text" name="name" value="{{ old('name' , auth()->user()->name) }}" class="form-control" placeholder="نام و نام خانوادگی">
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="input-group">
											 <span class="input-group-addon">
												<i class="fa fa-user-circle"></i>عکس پروفایل
											 </span>
                                            <input type="file" name="profile"  class="form-control" >
                                            @error('profile')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <img src="{{ asset(auth()->user()->profileImage()) }}" width="150px" height="150px">
                                    </div>
                                    <div class="footer text-center">
                                        <button class="btn btn-simple btn-success btn-lg text-blue"> ذخیره</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- left sidebar friends status -->
{{--                <div class="col-md-3 col-sm-12 col-xs-12">--}}
{{--                    <div id="onlineFriends">--}}
{{--                        <h3 class="about">وضعیت دوستان</h3>--}}
{{--                        <ul>--}}
{{--                            <li><button class="btn btn-success btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">صفا</span></button><span class="text-success status"> آنلاین</span></li>--}}
{{--                            <li><button class="btn btn-danger btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">مریم</span></button><span class="text-danger status"> آفلاین</span></li>--}}
{{--                            <li><button class="btn btn-success btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">محسن</span></button><span class="text-success status"> آنلاین</span></li>--}}
{{--                            <li><button class="btn btn-primary btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">احمد</span></button><span class="text-primary status"> در حال مکالمه</span></li>--}}
{{--                            <li><button class="btn btn-warning btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">علی</span></button><span class="text-warning status"> معلق</span></li>--}}
{{--                            <li><button class="btn btn-primary btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">سینا</span></button><span class="text-primary status"> در حال مکالمه</span></li>--}}
{{--                            <li><button class="btn btn-info btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">مبینا</span></button><span class="text-info status"> مشغول</span></li>--}}
{{--                            <li><button class="btn btn-success btn-xs"><img class="onlineFriendsPics" src="pics/f-avatar.jpg" width="35px"><span class="onlineFriendsNames">میثم</span></button><span class="text-success status"> آنلاین</span></li>--}}
{{--                        </ul>--}}
{{--                        <a class="text-success more" href="#">بیشتر</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </main>


@endsection
