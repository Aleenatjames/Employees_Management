<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    //Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');

     //Users
     Route::get('/users', [UserController::class, 'index'])->name('users.index');
    //  Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    //  Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
     Route::delete('/users/{id}/delete', [RoleController::class, 'destroy'])->name('users.destroy');

     //Company
     Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
     Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
     Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
     Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
     Route::post('/company/{id}', [CompanyController::class, 'update'])->name('company.update');
     Route::delete('/company/{id}/delete', [CompanyController::class, 'destroy'])->name('company.destroy');
});



require __DIR__.'/auth.php';