<?php

namespace Modules\Category\Services;

use Modules\Category\App\Models\Category;

class CategoryService
{

    public function store($request)
    {
        return Category::query()->create([
            'title' => $request->title ,
             'slug'  => $this->makeSlug($request->title) ,
             'keywords'  => $request->keywords ,
             'description'  => $request->description ,
             'status' => $request->status  ,
             'user_id'  => auth()->id() ,
             'parent_id'  => $request->parent_id ,
        ]);
    }

    public function update($request , $category)
    {
        return $category->update([
            'title' => $request->title ,
            'slug'  => $this->makeSlug($request->title) ,
            'keywords'  => $request->keywords ,
            'description'  => $request->description ,
            'status' => $request->status  ,
            'user_id'  => auth()->id() ,
            'parent_id'  => $request->parent_id ,
        ]);
    }

    private function makeSlug($title)
    {
        $url = str_replace('_' , '' , $title);
        return preg_replace('/\s+/' , '-' , $url);
    }

}
