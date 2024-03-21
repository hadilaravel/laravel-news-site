<?php

namespace Modules\Category\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Post\App\Models\Post;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title' , 'slug' , 'keywords' , 'description' , 'status' , 'user_id' , 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function parent()
    {
        return  $this->belongsTo(__CLASS__ , 'parent_id');
    }

    public function subCategories()
    {
        return  $this->hasMany(__CLASS__ , 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class );
    }

}
