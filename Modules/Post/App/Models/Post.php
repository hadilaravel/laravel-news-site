<?php

namespace Modules\Post\App\Models;

use App\Models\User;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;
use Modules\Category\App\Models\Category;
use Modules\Comment\App\Models\Comment;
use Modules\Comment\Trait\HaveComments;
use Modules\Post\Database\factories\PostFactory;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model implements Viewable
{
    use HasFactory , InteractsWithViews , Likeable , HaveComments;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title' , 'video' , 'type_text' ,'category_id' , 'user_id' , 'slug' , 'time_to_read' , 'status' , 'type' , 'imageName' , 'imagePath' , 'score' , 'body' ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function postImage()
    {
        return  asset('storage/images/' . $this->imageName);
    }

    public function isVideoPost()
    {
        return $this->type_text == 1 and File::exists($this->video) ? true : false;
    }

}
