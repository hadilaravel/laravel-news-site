<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Post\Repositories\PostRepo;
use Modules\Role\App\Http\Requests\AddRoleRequest;
use Modules\Role\Repositories\RoleRepo;
use Modules\User\App\Http\Requests\UserRequest;
use Modules\User\App\Http\Requests\UserUpdateRequest;
use Modules\User\App\Jobs\SendEmailToUsersMailJob;
use Modules\User\App\Policies\UserPolicy;
use Modules\User\Repositories\UserRepo;
use Modules\User\Services\UserService;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public UserRepo $userRepo;
    public UserService $userService;

    public function __construct(UserRepo $userRepo , UserService $userService)
    {
        SendEmailToUsersMailJob::dispatch();
        $this->userRepo = $userRepo;
        $this->userService = $userService;
    }

    public function index()
    {
        $this->authorize('index' , User::class);
        $users = $this->userRepo->index() ;
        return view('user::index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('index' , User::class);
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('index' , User::class);
        $this->userService->store($request);
        return to_route('admin.users.index');
    }

    /**
     * Show the specified resource.
     */
    public function show()
    {
        abort(404);
//        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('index' , User::class);
//        $user = $this->userRepo->findById($id);
        return view('user::edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('index' , User::class);
        $this->userService->update($request , $user);
        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('index' , User::class);
        $this->userRepo->delete($user);
        return to_route('admin.users.index');
    }

    public function showRoles(User $user)
    {
        return view('user::roles' , compact('user'));
    }

    public function addRole(User $user , RoleRepo $roleRepo)
    {
        $this->authorize('index' , User::class);
        $roles = $roleRepo->index()->get();
        return view('user::add-roles' , compact('user' , 'roles'));
    }

    public function addRoleSave(AddRoleRequest $request , User $user )
    {
        $this->authorize('index' , User::class);
        $this->userService->addRole($request->role , $user);

        alert()->success('اضافه کردن مقام' , 'عملیات با موفقیت انجام شد');
        return to_route('admin.users.show-role' , $user);
    }

    public function deleteRole(User $user , Role $role)
    {
        $this->authorize('index' , User::class);
        $this->userService->deleteRole($user , $role->name);

        alert()->success(' پاک کردن مقام' , 'عملیات با موفقیت انجام شد');
        return to_route('admin.users.show-role' , $user);
    }

    public function status(User $user)
    {
        $this->authorize('index' , User::class);

        $user->status = $user->status == 0 ? 1 : 0;
        $user->save();
        alert()->success(' وضعیت  کاربر' , 'وضعیت  کاربر با موفقیت  تغیر کرد');
        return to_route('admin.users.index');
    }

    public function profile(PostRepo $postRepo)
    {
        if(!auth()->check())
        {
            return to_route('home.index');
        }
        $user = auth()->user();
        $posts = $postRepo->index()->where('user_id' , $user->id)->limit(5)->get();
        return view('user::profile.profile' , compact('posts'));
    }


    public function editProfile(Request $request ,User $user)
    {
        $this->userService->updateProfile($request , $user);
        alert()->success('ویرایش پروفایل' , 'عملیات با موفقیت انجام شد');
        return back();
    }

}
