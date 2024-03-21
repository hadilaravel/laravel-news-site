<?php

namespace Modules\Home\Repositories;

use Illuminate\Support\Facades\Cache;
use Modules\Advertising\App\Models\Advertising;
use Modules\Category\App\Models\Category;
use Modules\Post\App\Models\Post;

class HomeRepo
{

    public function latestPosts()
    {
        return Post::query()->where('status' , 1)->latest()->limit(8);
    }

    public function activeCategories()
    {
        return Category::query()->where('status' , 1)->latest();
    }

    public function postMostViews()
    {
        return Post::query()->where('status' , 1)->orderByViews()->latest()->limit(4)->get();
    }

    public function vipSliderPosts()
    {
        return Post::query()->where('status' , 1)->where('type' , 1)->latest()->limit(4)->get();
    }

    public function activeAdvertisings()
    {
        return Advertising::query()->where('status' , 1)->latest()->limit(2)->get();
    }

    public function serachPost($serach)
    {
        return Post::query()->where('title' , 'LIKE', '%' . $serach . '%' )->
        where('body' , 'LIKE', '%' . $serach . '%' )->get()  ;
    }
}
