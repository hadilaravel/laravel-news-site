    @forelse($categoryPosts as $categoryPost)
        <div class="col-md-4">
            <div class="post-box">
                <a href="{{ route('post.details' , $categoryPost->slug) }}">
                    <figure>
                        <img src="{{  $categoryPost->postImage() }}" alt="{{ $categoryPost->title }}">
                        <figcaption class="meta-fig">
                            <span><i class="fa fa-clock-o"></i> {{ jdate($categoryPost->created_at)->format('Y-m-d') }}</span>&nbsp;
                            {{--                        <span><i class="fa fa-clock-o"></i> {{ $latestPost->created_at->diffForHumans() }}</span>&nbsp;--}}
                            <span><i class="fa fa-comment-o"></i> 12</span>
                        </figcaption>
                        <figcaption class="view">
                            <span> {{ $categoryPost->category->title  }}</span>
                            @if($categoryPost->category->parent)
                                <span> {{ $categoryPost->category->parent->title  }}</span>
                            @endif
                        </figcaption>
                    </figure>
                    <div class="text-p">
                        <h5>{{ $categoryPost->title }}</h5>
                        <p>
                            {!!  \Illuminate\Support\Str::limit($categoryPost->body , 250 ) !!}
                        </p>
                        <div class="text-rigt">
                            <a href="{{ route('post.details' , $categoryPost->slug) }}">ادامه ...</a></div>
                    </div>
                </a>
            </div>
        </div>
    @empty
        <p>پستی وجود ندارد</p>
    @endforelse
