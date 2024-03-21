<div class="main-slider-box">
    <div class="owl-carousel owl-theme main-slider">

        @php
            $key = 0;
        @endphp

        @foreach($vipSliderPosts as $vipSliderPost)
            @php
                $key += 1;
            @endphp
            <div class="item">
            <figure>
                <img src="{{ $vipSliderPost->postImage() }}" alt="">
                <figcaption class="gradient-fig"></figcaption>
                <figcaption class="desc-fig">
                       <span style="cursor: pointer" onclick="document.getElementById('formLikePostHome{{ $key }}').submit()">
                              @if(auth()->check())
                               <i class="fa fa-{{ auth()->user()->hasLiked($vipSliderPost) ? "heart" : "heart-o" }}"></i>
                           @else
                               <i class="fa fa-heart-o"></i>
                           @endif
                           {{ $vipSliderPost->likers()->count() }}
                           <form id="formLikePostHome{{ $key }}" action="{{ route('post.like' , $vipSliderPost->id) }}" method="post">@csrf</form>
                     </span>
                    <span><i class="fa fa-eye"></i> {{  views($vipSliderPost)->unique()->count() }} تعداد بازدید</span>
                    <h3>{{ $vipSliderPost->title }}</h3>
                    <span><i class="fa fa-clock-o"></i>  {{ $vipSliderPost->created_at->diffForHumans()  }} </span>
                    <p>
                        {{ \Illuminate\Support\Str::limit($vipSliderPost->body , 330) }}
                    </p>
                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>
</div>

