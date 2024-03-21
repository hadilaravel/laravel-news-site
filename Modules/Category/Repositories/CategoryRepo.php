<?php

namespace Modules\Category\Repositories;

use Modules\Category\App\Models\Category;

class CategoryRepo
{

    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($category)
    {
        return $category->delete();
    }

    public static function mainCategory()
    {
        return Category::query()->whereNull('parent_id')->get();
    }

    public function getActiveCategories()
    {
        return $this->query()->where('status' , 1)->latest();
    }

    public static function getActiveCategoriesFooter()
    {
        return Category::query()->where('status' , 1)->latest()->get();
    }

    public function query()
    {
        return Category::query();
    }

    public function allCategory($category)
    {
        return $this->query()->where('id' , '!=' , $category->id)->get();
    }

}
