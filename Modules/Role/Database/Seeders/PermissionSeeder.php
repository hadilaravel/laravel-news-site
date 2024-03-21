<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Role\App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach(Permission::$permissions as $permission){
            \Spatie\Permission\Models\Permission::findOrCreate($permission);
        }
    }
}
