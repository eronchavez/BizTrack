<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;

Route::get('/', function () {
    return view('home');
});


Route::post('/role', [RoleController::class, 'role'])->name('role');

Route::middleware(['auth' , 'role:admin'])->group(function()
    {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    }
);



Route::middleware(['auth' , 'role:manager'])->group(function()
    {
        Route::get('/manager/dashboard', [ManagerController::class , 'index'])->name('manager.dashboard');
    }
);


