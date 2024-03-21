<?php

namespace Modules\Role\App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\App\Models\Permission;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        if($user->hasPermissionTo(Permission::PERMISSION_ROLES)){
            return true;
        }
    }

}
