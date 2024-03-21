<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\App\Http\Controllers\PostController;

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

    Route::prefix('post')->group(function (){
        Route::get('/' , [PostController::class , 'index'])->name('admin.post.index');
        Route::get('create' , [PostController::class , 'create'])->name('admin.post.create');
        Route::post('create/store' , [PostController::class , 'store'])->name('admin.post.store');
        Route::get('edit/{post}' , [PostController::class , 'edit'])->name('admin.post.edit');
        Route::put('update/{post}' , [PostController::class , 'update'])->name('admin.post.update');
        Route::delete('destroy/{post}' , [PostController::class , 'destroy'])->name('admin.post.destroy');
        Route::get('status/{post}' , [PostController::class , 'status'])->name('admin.post.status');
    });
});

Route::get('post/{post:slug}' , [PostController::class , 'details'] )->name('post.details');
Route::get('home/posts' , [PostController::class , 'posts'])->name('home.posts');
Route::middleware('auth')->post('post/like/{post}' , [PostController::class , 'like'])->name('post.like');
