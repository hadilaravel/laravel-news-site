<?php

namespace Modules\Role\App\Models;


use Modules\Role\Database\factories\RoleFactory;
use Spatie\Permission\Models\Role as RoleSpatie;

class Role extends RoleSpatie
{

    protected $fillable = [];


}
