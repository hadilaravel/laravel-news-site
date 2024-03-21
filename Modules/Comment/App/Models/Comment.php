<?php

namespace Modules\Comment\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\Database\factories\CommentFactory;
use Overtrue\LaravelLike\Traits\Likeable;

class Comment extends Model
{
    use HasFactory , Likeable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'comment_id',
        'commentable_id',
        'commentable_type',
         'body',
         'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(__CLASS__ , 'comment_id');
    }

    public function comments()
    {
        return $this->hasMany(__CLASS__ , 'comment_id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }


}
