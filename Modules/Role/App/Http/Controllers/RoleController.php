<?php

namespace Modules\Role\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Role\App\Http\Requests\RoleRequest;
use Modules\Role\App\Models\Role;
use Modules\Role\Repositories\PermissionRepo;
use Modules\Role\Repositories\RoleRepo;
use Modules\Role\Services\RoleService;

class RoleController extends Controller
{

    public RoleRepo $roleRepo;
    public RoleService $roleService;

    public function __construct(RoleRepo $roleRepo , RoleService $roleService)
    {
        $this->roleRepo = $roleRepo;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $this->authorize('index' , Role::class);

        $roles = $this->roleRepo->index()->paginate(10);
        return view('role::index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PermissionRepo $permissionRepo)
    {
        $this->authorize('index' , Role::class);

        $permissions = $permissionRepo->all();
        return view('role::create' , compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $this->authorize('index' , Role::class);

        $this->roleService->store($request);
        alert()->success('ساخت مقام' , 'مقام با موفقیت ساخته شد');
        return to_route('admin.roles.index');
    }

    /**
     * Show the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id , PermissionRepo $permissionRepo)
    {
        $this->authorize('index' , Role::class);

        $role = $this->roleRepo->findById($id);
        $permissions = $permissionRepo->all();
        return view('role::edit' , compact('role' , 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, $id): RedirectResponse
    {
        $this->authorize('index' , Role::class);

        $this->roleService->update($request , $id);
        alert()->success('ویرایش مقام' , 'مقام با موفقیت ویرایش شد');
        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('index' , Role::class);

        $this->roleRepo->delete($id);
        alert()->success('حذف مقام' , 'مقام با موفقیت حذف شد');
        return to_route('admin.roles.index');
    }
}
