<?php

namespace Modules\Advertising\Services;

use Illuminate\Support\Facades\File;
use Modules\Advertising\App\Models\Advertising;

class AdvertisingService
{

    public function store($request)
    {
        $inputs = [
            'title' => $request->title,
            'link' => $request->link,
            'user_id' => auth()->id(),
            'status' => $request->status
        ];
        if($request->hasFile('image')) {
            $imageName = 'advertising/image/' . time().'.'.$request->image->extension();
            $request->image->move(public_path('advertising/image'), $imageName);
            $inputs['image'] = $imageName;
        }
        return Advertising::query()->create($inputs);
    }

    public function update( $request , $advertising)
    {
        $inputs = [
            'title' => $request->title,
            'link' => $request->link,
            'user_id' => auth()->id(),
            'status' => $request->status
        ];
        if($request->hasFile('image')) {
            if($advertising->image !== null and File::exists($advertising->image))
            {
                File::delete($advertising->image);
            }
            $imageName = 'advertising/image/' . time().'.'.$request->image->extension();
            $request->image->move(public_path('advertising/image'), $imageName);
            $inputs['image'] = $imageName;
        }
        return $advertising->update($inputs);
    }

}
