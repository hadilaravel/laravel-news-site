<?php

namespace Modules\User\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\File;

class UserRepo
{
    public function index()
    {
        return User::query()->where('id' , '!=' , auth()->id())->latest()->paginate(10);
    }

    public function findById($id)
    {
        return User::query()->findOrFail($id);
    }

    public function delete($user)
    {
        if($user->profile_photo_path !== null and File::exists($user->profile_photo_path))
        {
            File::delete($user->profile_photo_path);
        }
        return $user->delete();
    }


}
