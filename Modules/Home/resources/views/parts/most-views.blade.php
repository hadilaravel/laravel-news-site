<div class="top-sidebar-r">
    <span class="title">مطالب پر بازدید</span>
    @foreach($postMostViews as $key => $postMostView)
    <a href="{{ route('post.details' , $postMostView->slug) }}">
        <div class="bx">
            <div class="col-md-6">
                <div class="img-box">
                    <figure>
                        <img src="{{ $postMostView->postImage() }}" alt="">
                        <figcaption><span>{{ convertEnglishToPersian($key += 1) }}</span></figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="meta">
                    <h5>{{ $postMostView->title }}</h5>
                        <span ><i class="fa fa-clock-o"></i> {{ jdate($postMostView->created_at)->format('Y-m-d') }}</span>
                        <div class="text-left" >
                            <sub><i class="fa fa-comment"></i> {{ $postMostView->activeComments()->count() }}</sub>
                        </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
