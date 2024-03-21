@php
$key = 0;
@endphp

@forelse($post->activeComments() as  $comment)
    @php
        $key += 1;
    @endphp
    <div class="divComment">
        <div class="divCommentOne">
            <img src="{{ $comment->user->profileImage() }}" width="60px" height="60px" >
        </div>
        <div>
            {{ $comment->user->name }}
            {{ jdate($comment->created_at)->format('%A, %d %B %y') }}
             <p>{{ $comment->body }}</p>
        </div>
        <span style="cursor: pointer" onclick="document.getElementById('formLikeComment{{ $key }}').submit()">
                              @if(auth()->check())
                          <i class="fa fa-{{ auth()->user()->hasLiked($comment) ? "heart" : "heart-o" }}"></i>
                              @else
                                <i class="fa fa-heart-o"></i>
                               @endif
                             {{ $comment->likers()->count() }}
                           <form id="formLikeComment{{ $key }}" action="{{ route('comment.like' , $comment->id) }}" method="post">@csrf</form>
        </span>
    </div>
    @foreach($comment->comments as $answer )
        <div class="divComment">
            <div class="divCommentOne">
                <img src="{{ $answer->user->profileImage() }}" width="60px" height="60px" >
            </div>
            <div>
                {{ $answer->user->name }}
                {{ jdate($answer->created_at)->format('%A, %d %B %y') }}
                <p>{{ $answer->body }}</p>
            </div>
        </div>
    @endforeach
@empty
    <p>نظری وجود ندارد</p>
@endforelse
