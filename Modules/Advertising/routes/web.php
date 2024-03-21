<?php

use Illuminate\Support\Facades\Route;
use Modules\Advertising\App\Http\Controllers\AdvertisingController;

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

    Route::prefix('advertising')->group(function (){
        Route::get('/' , [AdvertisingController::class , 'index'])->name('admin.advertising.index');
        Route::get('create' , [AdvertisingController::class , 'create'])->name('admin.advertising.create');
        Route::post('create/store' , [AdvertisingController::class , 'store'])->name('admin.advertising.store');
        Route::get('edit/{advertising}' , [AdvertisingController::class , 'edit'])->name('admin.advertising.edit');
        Route::put('update/{advertising}' , [AdvertisingController::class , 'update'])->name('admin.advertising.update');
        Route::delete('destroy/{advertising}' , [AdvertisingController::class , 'destroy'])->name('admin.advertising.destroy');
        Route::get('status/{advertising}' , [AdvertisingController::class , 'status'])->name('admin.advertising.status');
    });

});
