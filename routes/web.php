<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginprocess', [LoginController::class, 'loginProcess'])->name('login.process');

Route::middleware(['auth'])->group(function () {
    //LOGOUT
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    //ADMIN
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //CONFIGURAÇÕES
    Route::get('/admin/config', [ConfigController::class, 'index'])->name('admin.config.index');
    Route::get('/admin/show-config/{config}', [ConfigController::class, 'show'])->name('admin.config.show');
    Route::get('/admin/create-config', [ConfigController::class, 'create'])->name('admin.config.create');
    Route::post('/admin/store-config', [ConfigController::class, 'store'])->name('admin.config.store');
    Route::get('/admin/edit-config/{config}', [ConfigController::class, 'edit'])->name('admin.config.edit');
    Route::put('/admin/update-config/{config}', [ConfigController::class, 'update'])->name('admin.config.update');
    Route::delete('/admindelete-config/{config}', [ConfigController::class, 'destroy'])->name('admin.config.delete');

    //USUÁRIOS
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/show-user/{user}', [UserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/create-user', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/store-user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/edit-user/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/update-user/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admindelete-user/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');


    //BANNER TOPO
    Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner.index');
    Route::get('/admin/show-banner}', [BannerController::class, 'show'])->name('admin.banner.show');
    Route::get('/admin/create-banner', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/admin/store-banner', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/admin/edit-user/{banner}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::put('/admin/update-user/{banner}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('/admindelete-user/{banner}', [BannerController::class, 'destroy'])->name('admin.banner.delete');
});
