<?php

namespace Modules\Role\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepo
{

    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id' , $id)->delete();
    }

    private function query()
    {
        return Role::query();
    }

}
