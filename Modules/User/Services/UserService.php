<?php

namespace Modules\User\Services;

use Modules\User\App\Models\User;
use Illuminate\Support\Facades\File;

class UserService
{
    public function store($request)
    {
        $inputs = [
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ];
        if($request->hasFile('profile')) {
            $imageName = 'users/profile/' . time().'.'.$request->profile->extension();
            $request->profile->move(public_path('users/profile'), $imageName);
            $inputs['profile_photo_path'] = $imageName;
        }
        return User::query()->create($inputs);
    }

    public function update($request , $user)
    {
        $inputs = [
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ];

        if($request->hasFile('profile')) {
            if($user->profile_photo_path !== null and File::exists($user->profile_photo_path))
            {
                File::delete($user->profile_photo_path);
            }
            $imageName = 'users/profile/' . time().'.'.$request->profile->extension();
            $request->profile->move(public_path('users/profile'), $imageName);
            $inputs['profile_photo_path'] = $imageName;
        }
        return $user->update($inputs);
    }

    public function addRole($role , $user)
    {
        return $user->assignRole($role);
    }

    public function deleteRole($user , $role)
    {
        return $user->removeRole($role);
    }

    public function updateProfile( $request , $user)
    {
        $request->validate([
            'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $inputs = $request->all();
        if($request->hasFile('profile')) {
            if($user->profile_photo_path !== null and File::exists($user->profile_photo_path))
            {
                File::delete($user->profile_photo_path);
            }
            $imageName = 'users/profile/' . time().'.'.$request->profile->extension();
            $request->profile->move(public_path('users/profile'), $imageName);
            $inputs['profile_photo_path'] = $imageName;
        }
        return $user->update($inputs);
    }

}
