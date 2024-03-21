<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\App\Http\Controllers\RoleController;

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

    Route::prefix('role')->group(function (){
        Route::get('/' , [RoleController::class , 'index'])->name('admin.roles.index');
        Route::get('create' , [RoleController::class , 'create'])->name('admin.roles.create');
        Route::post('create/store' , [RoleController::class , 'store'])->name('admin.roles.store');
        Route::get('edit/{id}' , [RoleController::class , 'edit'])->name('admin.roles.edit');
        Route::put('update/{id}' , [RoleController::class , 'update'])->name('admin.roles.update');
        Route::delete('destroy/{id}' , [RoleController::class , 'destroy'])->name('admin.roles.destroy');
//        Route::get('status/{id}' , [RoleController::class , 'status'])->name('admin.roles.status');
    });

});

