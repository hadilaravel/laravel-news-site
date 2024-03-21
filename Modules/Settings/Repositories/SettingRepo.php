<?php

namespace Modules\Settings\Repositories;

use Illuminate\Support\Facades\File;
use Modules\Settings\App\Models\Setting;

class SettingRepo
{

    public function index()
    {
        return Setting::query()->first();
    }

    public function update($request , $setting)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:100',
            'icon' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $inputs = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if($request->hasFile('icon')){
            $this->deleteIcon($setting);
            $inputs['icon'] =  $this->uploadIcon($request->icon);
        }
        $setting->update($inputs);
    }

    public function uploadIcon($icon)
    {
        $iconName = 'settings/icon/' . time().'.'. $icon->extension();
        $icon->move(public_path('settings/icon'), $iconName);
        return $iconName;
    }

    public function deleteIcon($setting)
    {
        if(File::exists(public_path($setting->icon)) and $setting->icon !== null )
        {
            return  File::delete(public_path($setting->icon));
        }
    }


}
