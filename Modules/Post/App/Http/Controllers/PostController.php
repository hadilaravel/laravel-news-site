<?php

namespace Modules\Post\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Post\App\Http\Requests\PostRequest;
use Modules\Post\App\Models\Post;
use Modules\Post\App\Notifications\StorePost;
use Modules\Post\Repositories\PostRepo;
use Modules\Post\Services\PostService;
use Modules\Share\Repositories\ShareRepo;

class PostController extends Controller
{

    private string $class = Post::class;

    public PostRepo $postRepo;
    public PostService $postService;

    public function __construct(  PostRepo $postRepo ,PostService $postService)
    {
        $this->postRepo = $postRepo;
        $this->postService = $postService;
    }

    public function index()
    {
        $this->authorize('index' , $this->class);
        $posts = $this->postRepo->index()->paginate(10);
        return view('post::index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryRepo $categoryRepo)
    {
        $this->authorize('index' , $this->class);
        $categories = $categoryRepo->getActiveCategories()->get();
        return view('post::create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $this->authorize('index' , $this->class);
       [$imageName , $imagePath] =  $this->postService->uploadImage($request->file('image'));
        $this->postService->store($request , auth()->id() , $imageName , $imagePath );
        Notification::send(auth()->user() , new StorePost($request->title , $request->body , "admin.post.index"));
        alert()->success('ساخت پست' , 'عملیات با موفقیت انجام شد');
        return to_route('admin.post.index');
    }


    public function edit(Post $post , CategoryRepo $categoryRepo)
    {
        $this->authorize('index' , $this->class);

        $categories = $categoryRepo->getActiveCategories()->get();
        return view('post::edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $this->authorize('index' , $this->class);

        if(!is_null($request->file('image'))) {
            $this->postService->deleteImage($post);
            [$imageName, $imagePath] = $this->postService->uploadImage($request->file('image'));
        }else{
            $imageName = $post->imageName;
            $imagePath = $post->imagePath;
        }

        $this->postService->update($request, $post, $imageName, $imagePath);

        alert()->success('ویرایش پست' , 'عملیات با موفقیت انجام شد');
        return to_route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('index' , $this->class);
        $this->postService->deleteImage($post);
        $this->postService->deleteVideo($post);
        $this->postRepo->delete($post);

        alert()->success('حذف پست' , 'عملیات با موفقیت انجام شد');
        return to_route('admin.post.index');
    }


    public function status(Post $post)
    {
        $this->authorize('index' , $this->class);

        $post->status = $post->status == 0 ? 1 : 0;
        $post->save();
        alert()->success(' وضعیت  پست' , 'وضعیت  پست با موفقیت  تغیر کرد');
        return to_route('admin.post.index');
    }

    public function details(Post $post)
    {
        views($post)->unique()->record();
        return view('post::home.detail' , compact('post') );
    }

    public function posts()
    {
        $posts = $this->postRepo->index()->paginate(8);
        return view('post::home.posts' , compact('posts') );
    }


    public function like(Post $post , Request $request)
    {
        if(!Auth::check())
        {
            ShareRepo::successMessage("ابتدا باید ثبت نام کنید در سایت");
            return  back();
        }
        $user = $request->user();
        $user->hasLiked($post) ?  $user->unlike($post) : $user->like($post);
        $likeText =  $user->hasLiked($post) ? ' لایک شد' : ' آن لایک شد ';
        ShareRepo::successMessage($likeText);
        return back();
    }

}
