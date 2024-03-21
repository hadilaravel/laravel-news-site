<?php

namespace Modules\Advertising\App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\App\Models\Permission;

class AdvertisingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function Advertising(User $user)
    {
        if($user->hasPermissionTo(Permission::PERMISSION_ADVERTISINGS)){
            return true;
        }
    }

}
