@php
    $key = 0;
@endphp
<div class="top-sidebar-l">
    <span class="title">آخرین نظرات</span>
    @foreach($latestComments as $latestComment)
        @php
            $key += 1;
        @endphp
    <a href="#">
        <div class="bx">
            <div class="col-md-3 nopadding">
                   <span style="cursor: pointer" onclick="document.getElementById('formLikeCommentHome{{ $key }}').submit()">
                              @if(auth()->check())
                           <i class="fa fa-{{ auth()->user()->hasLiked($latestComment) ? "heart" : "heart-o" }}"></i>
                       @else
                           <i class="fa fa-heart-o"></i>
                       @endif
                       {{ $latestComment->likers()->count() }}
                           <form id="formLikeCommentHome{{ $key }}" action="{{ route('comment.like' , $latestComment->id) }}" method="post">@csrf</form>
                     </span>
            </div>
            <div class="col-md-8 nopadding">
                <p>
                    {{ $latestComment->body }}
                </p>
            </div>
        </div>
    </a>
    @endforeach
</div>
