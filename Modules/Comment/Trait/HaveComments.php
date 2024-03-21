<?php

namespace Modules\Comment\Trait;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Modules\Comment\App\Models\Comment;

trait HaveComments
{
    use HasRelationships;

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function activeComments()
    {
        return $this->comments()->where('status' , 1)->get();
    }

}
