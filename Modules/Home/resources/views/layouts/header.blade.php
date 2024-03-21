<div class="top-bar">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="search-btn">
                <form id="formSerach" action="{{ route('home.search')}}" method="get">
                <input name="search" value="{{ old('search') }}" class="searchInput" type="text" placeholder="دنباله چی میگردی . . .">
                <span onclick="document.getElementById('formSerach').submit()"><i class="fa fa-search"></i></span>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="top-cat-box">
                <div class="col-md-12">
                    <div class="menu">
                        <ul>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="{{ route('home.posts') }}">مقالات</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                   <div class="show-cat">
                       <span>
                           دسته ها
                           <i class="fa fa-bars"></i>
                       </span>
                   </div>
                   </div> -->
            </div>
        </div>
    </div>
</div>
<div class="main-header">
    <div class="container-fluid">
        <div class="col-md-10">
            <div class="main-menu">
                <ul>
                    <li><a href="{{ route('home.index') }}">خانه</a></li>
                    @foreach($mainCategories as $category)
                    <li><a href="{{ route('category.posts' , $category) }}"> {{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            @auth

                <ul class="nav nav-pills">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <a href="{{ route('user.profile') }}" style="margin-right: 15px">
                                صفحه پروفایل
                                <i class="fa fa-user" style="margin-right: 20px"></i>
                            </a>
                            <a href="{{ route('auth.logout') }}" style="margin-right: 15px">
                                خروج
                                <i class="fa fa-sign-out" style="margin-right: 70px"></i>
                            </a>
                        </ul>
                    </li>
                </ul>

            @endauth

            @guest
                    <div class="social-box" >
                    <a href="{{ route('auth.register') }}"  >ثبت نام</a> / <a  href="{{ route('auth.login') }}"  >ورود </a>
                </div>
            @endguest

        </div>
    </div>
</div>
