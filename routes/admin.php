<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

// Admin Login;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function () {
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

Route::group(['middleware' => ['admin']], function () {

    Route::prefix('admin')->group(function () {
        // Admin Dashboard;
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // User;
        Route::get('users', [UserController::class, 'index'])->name('admin.user');
        Route::get('users/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('users/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('users/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('user/delete', [UserController::class, 'delete'])->name('admin.user.delete');

        // Admin;
        Route::get('admins', [AdminController::class, 'index'])->name('admin.admin');
        Route::get('admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
        Route::post('admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
        Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
        Route::post('admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
        Route::post('admin/delete', [AdminController::class, 'delete'])->name('admin.admin.delete');
    });
});
