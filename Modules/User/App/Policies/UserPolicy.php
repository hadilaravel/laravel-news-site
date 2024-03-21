<?php

namespace Modules\User\App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\App\Models\Permission;

class UserPolicy
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
        if($user->hasPermissionTo(Permission::PERMISSION_USERS)){
            return true;
        }
    }

}
