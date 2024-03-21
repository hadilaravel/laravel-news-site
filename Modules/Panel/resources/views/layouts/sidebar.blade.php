<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('home.index') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>صفحه اصلی</span>
            </a>
            @permission('permission panel')
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            @endpermission

            <section class="sidebar-part-title">بخش محتوی</section>
            @permission('permission categories')
            <a href="{{ route('admin.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته ها</span>
            </a>
            @endpermission

            @permission('permission posts')
            <a href="{{ route('admin.post.index') }}" class="sidebar-link">
                <i class="fas fa-book"></i>
                <span>پست ها</span>
            </a>
            @endpermission

            @permission('permission comments')
            <a href="{{ route('admin.comment.index') }}" class="sidebar-link">
                <i class="fas fa-comment"></i>
                <span> نطرات</span>
            </a>
            @endpermission

            @permission('permission advertisings')
            <a href="{{ route('admin.advertising.index') }}" class="sidebar-link">
                <i class="fas fa-ad"></i>
                <span> تبلیغات</span>
            </a>
            @endpermission

            @permission('permission roles')
            <section class="sidebar-part-title"> سطوح دسترسی</section>

            <a href="{{ route('admin.roles.index') }}" class="sidebar-link">
                <i class="fas fa-chart-bar icon"></i>
                <span>مقام ها</span>
            </a>
            @endpermission

{{--            <section class="sidebar-group-link">--}}
{{--                <section class="sidebar-dropdown-toggle">--}}
{{--                    <i class="fas fa-chart-bar icon"></i>--}}
{{--                    <span>نوشته ها</span>--}}
{{--                    <i class="fas fa-angle-left angle"></i>--}}
{{--                </section>--}}
{{--                <section class="sidebar-dropdown">--}}
{{--                    <a href="#">مقالات</a>--}}
{{--                    <a href="#">پست ها</a>--}}
{{--                    <a href="#">دوره ها</a>--}}
{{--                </section>--}}
{{--            </section>--}}

            @permission('permission users')
            <section class="sidebar-part-title">بخش کاربران</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-users icon"></i>
                    <span>کاربران</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.users.index') }}">ادمین ها</a>
                    {{--                    <a href="#">مدرس ها</a>--}}
{{--                    <a href="#">دانشجو </a>--}}
                </section>
            </section>
            @endpermission

            <section class="sidebar-part-title"> تنظیمات</section>

            <a href="{{ route('admin.settings.index') }}" class="sidebar-link">
                <i class="fas fa-cogs icon"></i>
                <span>تنظیمات </span>
            </a>


        </section>
    </section>
</aside>
