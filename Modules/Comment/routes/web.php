<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\App\Http\Controllers\CommentController;

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

    Route::prefix('comment')->group(function (){
        Route::get('/' , [CommentController::class , 'index'])->name('admin.comment.index');
        Route::delete('destroy/{comment}' , [CommentController::class , 'destroy'])->name('admin.comment.destroy');
        Route::get('status/{comment}' , [CommentController::class , 'status'])->name('admin.comment.status');
    });

});

//add comment post
Route::post('comments/{post}' , [CommentController::class , 'storeComment'])->name('home.comments.store');
Route::middleware('auth')->post('comment/like/{comment}' , [CommentController::class , 'like'])->name('comment.like');
