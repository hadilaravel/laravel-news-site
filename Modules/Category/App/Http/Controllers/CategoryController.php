<?php

namespace Modules\Category\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Modules\Category\App\Http\Requests\CategoryRequest;
use Modules\Category\App\Models\Category;
use Modules\Category\App\Notifications\CreatedCategory;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Category\Services\CategoryService;
use Modules\Share\Repositories\ShareRepo;
use Modules\User\App\Notifications\SendEmail;

class CategoryController extends Controller
{

    public CategoryRepo $categoryRepo;
    public CategoryService $categoryService;

    public function __construct( CategoryRepo $categoryRepo ,CategoryService $categoryService)
    {
        $this->categoryRepo = $categoryRepo;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $this->authorize('index' , Category::class);

//        auth()->user()->unreadNotifications->markAsRead();

        $categories = $this->categoryRepo->index()->paginate(10);
        return view('category::index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('index' , Category::class);

        $categories =  $this->categoryRepo->index()->get();
        return view('category::create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('index' , Category::class);

        $this->categoryService->store($request);
        Notification::send(auth()->user() , new CreatedCategory($request->title , $request->description , "admin.category.index" ));
        alert()->success('  دسته بندی' , ' دسته بندی با موفقیت ساخته شد');
        return to_route('admin.category.index')->with('swal-success' , 'دسته بندی با موفقیت ساخته شد');
    }


    public function edit(Category $category)
    {
        $this->authorize('index' , Category::class);

        $categories =  $this->categoryRepo->allCategory($category);
        return view('category::edit' , compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('index' , Category::class);

        $this->categoryService->update($request , $category);
        alert()->success(' ویرایش دسته بندی' , ' دسته بندی با موفقیت ویرایش شد');
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('index' , Category::class);

        $this->categoryRepo->delete($category);
        alert()->success('  دسته بندی' , ' دسته بندی با موفقیت حذف شد');
        return to_route('admin.category.index');
    }

    public function status(Category $category)
    {
        $this->authorize('index' , Category::class);

        $category->status = $category->status == 0 ? 1 : 0;
        $category->save();
//        alert()->success(' وضعیت دسته بندی' , 'وضعیت دسته بندی با موفقیت  تغیر کرد');
        ShareRepo::successMessage('وضعیت دسته بندی');
        return to_route('admin.category.index');
    }

    public function categoryPosts(Category $category)
    {
        $categories = $this->categoryRepo->index()->get();
        return view('category::home.category-posts' , compact('category' , 'categories'));
    }

}
