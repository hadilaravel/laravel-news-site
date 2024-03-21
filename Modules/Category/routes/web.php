<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\App\Http\Controllers\CategoryController;

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

    Route::prefix('category')->group(function (){
         Route::get('/' , [CategoryController::class , 'index'])->name('admin.category.index');
        Route::get('create' , [CategoryController::class , 'create'])->name('admin.category.create');
        Route::post('create/store' , [CategoryController::class , 'store'])->name('admin.category.store');
        Route::get('edit/{category}' , [CategoryController::class , 'edit'])->name('admin.category.edit');
        Route::put('update/{category}' , [CategoryController::class , 'update'])->name('admin.category.update');
        Route::delete('destroy/{category}' , [CategoryController::class , 'destroy'])->name('admin.category.destroy');
        Route::get('status/{category}' , [CategoryController::class , 'status'])->name('admin.category.status');
    });
});

Route::get('category/posts/{category}' , [CategoryController::class , 'categoryPosts'])->name('category.posts');
