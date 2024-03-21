<?php

namespace Modules\Panel\App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\App\Models\Permission;

class PanelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function index(User $user)
    {
        if($user->hasPermissionTo(Permission::PERMISSION_PANEL)){
            return true;
        }
    }

}
