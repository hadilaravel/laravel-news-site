<?php

namespace Modules\Post\Repositories;

use Modules\Post\App\Models\Post;

class PostRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($post)
    {
        return $post->delete();
    }

    public function query()
    {
        return Post::query();
    }

}
