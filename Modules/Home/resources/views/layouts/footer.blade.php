<div class="clear-fix"></div>
<div class="footer">
    <div class="container-fluid">
        <div class="col-md-5">
            <div class="footer-box">
                <span class="title"> سایت خبری </span>
                <p>متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید
                    سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی از
                    صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم
                    تولید سادگی از صنعت متن ساختگی بام تولید سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید
                    سادگی از صنعت متن ساختگی با تولید سادگی نامفهوم تولید سادگی از صنعت متن سادگی نامفهوم تولید
                    سادگی از صنعت
                </p>
            </div>
        </div>
        @foreach($categories->chunk(5) as $category)
        <div class="col-md-2">
            <div class="footer-box">
                <span class="title">دسترسی سریع</span>
                <ul>
                    @foreach($category as $cat)
                    <li><a href="{{ route('category.posts' , $cat) }}">{{ $cat->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
        <div class="col-md-3">
            <div class="footer-box contact-box">
                <span class="title">تماس با ما</span>
                <p><i class="fa fa-phone"></i> 09194057841</p>
                <p><i class="fa fa-envelope-o"></i>persianphpprogrammer@gmail.com</p>
                <p><i class="fa fa-map-marker"></i> تهران </p>
            </div>
        </div>
        <div class="clear-fix"></div>
    </div>
</div>
<div class="end-wrapper">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="copy-r">
                <p>&copy; طراحی و ساخته شده توسط هادی کرمی</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="creator text-left">
                <p>طراحی سایت ،  لاراول</p>
            </div>
        </div>
    </div>
</div>
