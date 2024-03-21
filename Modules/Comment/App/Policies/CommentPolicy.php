<?php

namespace Modules\Comment\App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\App\Models\Permission;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function comment(User $user)
    {
        if($user->hasPermissionTo(Permission::PERMISSION_COMMENTS)){
            return true;
        }
    }

}
