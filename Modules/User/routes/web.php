<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->prefix('admin')->group(function (){

Route::prefix('users')->group(function(){
    Route::get('/' , [UserController::class , 'index'])->name('admin.users.index');
    Route::get('create' , [UserController::class , 'create'])->name('admin.users.create');
    Route::post('create/store' , [UserController::class , 'store'])->name('admin.users.store');
    Route::get('edit/{user}' , [UserController::class , 'edit'])->name('admin.users.edit');
    Route::put('update/{user}' , [UserController::class , 'update'])->name('admin.users.update');
    Route::delete('destroy/{user}' , [UserController::class , 'destroy'])->name('admin.users.destroy');
    Route::get('status/{user}' , [UserController::class , 'status'])->name('admin.users.status');


// add role
    Route::get('role/{user}' , [UserController::class , 'showRoles'])->name('admin.users.show-role');
    Route::get('add/{user}/role' , [UserController::class , 'addRole'])->name('admin.users.add-role');
    Route::post('add/{user}/role' , [UserController::class , 'addRoleSave'])->name('admin.users.add-role.store');

    Route::delete('delete/{user}/role{role}' , [UserController::class , 'deleteRole'])->name('admin.users.delete-role');
});

});

//    profile
Route::middleware('auth')->get('user/profile' , [UserController::class , 'profile'])->name('user.profile');
Route::middleware('auth')->post('user/profile/edit/{user}' , [UserController::class , 'editProfile'])->name('user.profile.edit');


Route::get('fire/event' , function (){
    event(new \Modules\User\App\Events\SendEmailToUserEvent("karamihadi42@gmail.com"));

    return "event fire";
} );
