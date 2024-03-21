<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\App\Http\Controllers\SettingsController;

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
    Route::prefix('settings')->group(function (){
      Route::get('/' , [SettingsController::class , 'index'])->name('admin.settings.index');
      Route::get('edit/{setting}' , [SettingsController::class , 'edit'])->name('admin.settings.edit');
      Route::put('update/{setting}' , [SettingsController::class , 'update'])->name('admin.settings.update');
    });
});
