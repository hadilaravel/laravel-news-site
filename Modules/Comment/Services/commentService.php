<?php

namespace Modules\Comment\Services;

use Modules\Comment\App\Models\Comment;
use Modules\Post\App\Models\Post;
use Modules\Role\App\Models\Permission;

class commentService
{

    public function store($request , $post)
    {
        return Comment::query()->create([
           'body' => $request->body,
           'user_id' => auth()->id() ,
           'commentable_id' => $post->id ,
          'commentable_type' => Post::class ,
            'status' => $this->setStatus(),
        ]);
    }

    private function setStatus()
    {
        if(auth()->user()->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN)){
            return 1;
        }
    }

}
