<?php

namespace Modules\Comment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Modules\Comment\App\Http\Requests\CommentRequest;
use Modules\Comment\App\Models\Comment;
use Modules\Comment\App\Notifications\StoreComment;
use Modules\Comment\Repositories\CommentRepo;
use Modules\Comment\Services\commentService;
use Modules\Post\App\Models\Post;
use Modules\Share\Repositories\ShareRepo;

class CommentController extends Controller
{

    public CommentRepo $commentRepo;

    public function __construct(CommentRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {
        $this->authorize('comment' , Comment::class);

        $comments = $this->commentRepo->index()->paginate(10);
        return view('comment::index' , compact('comments'));
    }



    public function status(Comment $comment)
    {
        $this->authorize('comment' , Comment::class);

        $comment->status = $comment->status == 0 ? 1 : 0;
        $comment->save();
        alert()->success(' وضعیت  نظر' , 'وضعیت  نظر با موفقیت  تغیر کرد')->persistent('باشه');
        return to_route('admin.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('comment' , Comment::class);

        $this->commentRepo->delete($comment);
        alert()->success('  نظر ' , '  نظر با موفقیت  حذف شد')->persistent('باشه');
        return to_route('admin.comment.index');
    }


    public function storeComment(CommentRequest $request , Post $post , commentService $commentService)
    {
        $commentService->store($request , $post);
        Notification::send(auth()->user() , new StoreComment($post->title , $request->body , "admin.comment.index"));
        alert()->success('  نظر ' , '  نظر شما پس از تایید در سایت نشان داده میشود  ')->persistent('باشه');
        return back();
    }

    public function like(Comment $comment , Request $request)
    {
        if(!Auth::check())
        {
            ShareRepo::successMessage("ابتدا باید ثبت نام کنید در سایت");
            return  back();
        }
        $user = $request->user();
        $user->hasLiked($comment) ?  $user->unlike($comment) : $user->like($comment);
        $likeText =  $user->hasLiked($comment) ? ' لایک شد' : ' آن لایک شد ';
        ShareRepo::successMessage($likeText);
        return back();
    }

}
