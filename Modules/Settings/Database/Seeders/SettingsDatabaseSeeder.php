<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Settings\App\Models\Setting;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->create([
           'title' => 'سایت خبری' ,
            'description'=> 'سایت خبری هادی کرمی',
            'icon' => 'settings/icon/icon.png',
        ]);
    }
}
