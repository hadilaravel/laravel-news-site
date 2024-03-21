<?php

namespace Modules\Comment\Repositories;

use Modules\Comment\App\Models\Comment;

class CommentRepo
{

    public function index()
    {
        return Comment::query()->latest();
    }

    public function delete($comment)
    {
        return $comment->delete();
    }

    public static function getLatestComments()
    {
        return Comment::query()->where('status' , 1)->latest();
    }

}
