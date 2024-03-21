<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\Post\App\Models\Post;

class PostService
{

    public function store($request , $user_id , $imageName , $imagePath)
    {
        $inputs = [
            'title' => $request->title ,
            'category_id' => $request->category_id ,
            'user_id' => $user_id ,
            'slug' => $this->makeSlug($request->title) ,
            'time_to_read' => $request->time_to_read ,
            'status' => $request->status ,
            'type' => $request->type ,
            'imageName' => $imageName ,
            'imagePath' => $imagePath ,
            'score' => $request->score ,
            'body' => $request->body,
            'type_text' => $request->type_text,
        ];

        if($request->type_text == 1 and $request->hasFile('video')){
           $inputs['video'] =  $this->uploadVideo($request->video);
        }

        return Post::query()->create($inputs);
    }

    public function update($request , $post  , $imageName , $imagePath)
    {
        $inputs = [
            'title' => $request->title ,
            'category_id' => $request->category_id ,
            'slug' => $this->makeSlug($request->title) ,
            'time_to_read' => $request->time_to_read ,
            'status' => $request->status ,
            'type' => $request->type ,
            'imageName' => $imageName ,
            'imagePath' => $imagePath ,
            'score' => $request->score ,
            'body' => $request->body,
            'type_text' => $request->type_text,
        ];

        if($request->type_text == 1 and $request->hasFile('video')){
            if($post->video !== null and File::exists($post->video))
            {
                File::delete($post->video);
            }
            $inputs['video'] =  $this->uploadVideo($request->video);
        }

        return $post->update($inputs);
    }

    private function makeSlug($title)
    {
        $url = str_replace('_' , '' , $title);
        return preg_replace('/\s+/' , '-' , $url);
    }

    public function uploadImage($file)
    {
        $imageName = time() . '.' . $file->extension();
        Storage::disk('public')->putFileAs('images' , $file , $imageName);

        $path = asset('storage/images/' . $imageName);

        return [$imageName , $path];
    }

    public function uploadVideo($video)
    {
        $videoName = 'posts/video/' . time().'.'. $video->extension();
        $video->move(public_path('posts/video'), $videoName);
        return $videoName;
    }

    public function deleteImage($post)
    {
        if(File::exists(public_path('storage/images/'  . $post->imageName)))
        {
            return  File::delete(public_path('storage/images/'  . $post->imageName));
        }
    }

    public function deleteVideo($post)
    {
        if(File::exists(public_path($post->video)))
        {
            return  File::delete(public_path($post->video));
        }
    }

}
