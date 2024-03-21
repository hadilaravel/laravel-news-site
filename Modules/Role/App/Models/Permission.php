<?php

namespace Modules\Role\App\Models;

use Modules\Role\Database\factories\PermissionFactory;
use Spatie\Permission\Models\Permission as PermissionSpatie;

class Permission extends PermissionSpatie
{

    PUBLIC CONST PERMISSION_SUPER_ADMIN = 'permission super admin';
    PUBLIC CONST PERMISSION_PANEL = 'permission panel';
    PUBLIC CONST PERMISSION_USERS = 'permission users';
    PUBLIC CONST PERMISSION_CATEGORIES = 'permission categories';
    PUBLIC CONST PERMISSION_ROLES = 'permission roles';
    PUBLIC CONST PERMISSION_POSTS = 'permission posts';
    PUBLIC CONST PERMISSION_AUTHORS = 'permission authors';
    PUBLIC CONST PERMISSION_COMMENTS = 'permission comments';
    PUBLIC CONST PERMISSION_ADVERTISINGS = 'permission advertisings';


    public static array $permissions = [
        self::PERMISSION_CATEGORIES,
        self::PERMISSION_PANEL,
        self::PERMISSION_USERS,
        self::PERMISSION_ROLES,
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_POSTS,
        self::PERMISSION_AUTHORS,
        self::PERMISSION_COMMENTS,
        self::PERMISSION_ADVERTISINGS
    ];


}
