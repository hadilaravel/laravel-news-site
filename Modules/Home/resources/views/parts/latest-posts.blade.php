<div class="container-fluid">
    <div class="blog-title-span">
        <span class="title">آخرین مطالب</span>
    </div>

    @foreach($latestPosts as $latestPost)
    <div class="col-md-3">
        <div class="post-box">
            <a href="{{ route('post.details' , $latestPost->slug) }}">
                <figure>
                    <img src="{{  $latestPost->postImage() }}" alt="{{ $latestPost->title }}">
                    <figcaption class="meta-fig">
                        <span><i class="fa fa-clock-o"></i> {{ jdate($latestPost->created_at)->format('Y-m-d') }}</span>&nbsp;
{{--                        <span><i class="fa fa-clock-o"></i> {{ $latestPost->created_at->diffForHumans() }}</span>&nbsp;--}}
                        <span><i class="fa fa-comment-o"></i> {{ $latestPost->activeComments()->count() }}</span>
                    </figcaption>
                    <figcaption class="view">
                        <span> {{ $latestPost->category->title  }}</span>
                        @if($latestPost->category->parent)
                            <span> {{ $latestPost->category->parent->title  }}</span>
                        @endif
                    </figcaption>
                </figure>
                <div class="text-p">
                    <h5>{{ $latestPost->title }}</h5>
                    <p>
                       {{ \Illuminate\Support\Str::limit($latestPost->body , 250 )}}
                    </p>
                    <div class="text-rigt">
                        <a href="{{ route('post.details' , $latestPost->slug) }}">ادامه ...</a></div>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
