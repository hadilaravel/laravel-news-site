<?php

namespace Modules\Settings\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Settings\App\Models\Setting;
use Modules\Settings\Repositories\SettingRepo;
use Modules\Share\Repositories\ShareRepo;

class SettingsController extends Controller
{

    public SettingRepo $settingRepo;

    public function __construct(SettingRepo $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    public function index()
    {
        $setting = $this->settingRepo->index();
        return view('settings::index'  , compact('setting'));
    }


    public function edit(Setting $setting)
    {
        return view('settings::edit' , compact('setting'));
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        $this->settingRepo->update($request , $setting);
        ShareRepo::successMessage('ویرایش تنظیمات');
        return  to_route('admin.settings.index');
    }

}
