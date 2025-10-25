<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;



Route::get('/', function () {
    return "Lipat ka sa route '/login' pre";
});




Route::get('/login', function () {
    return view('home');
})->name('login');


// The info from the form  will send to this route.
Route::post('/login', [RoleController::class, 'role'])->name('role');

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

//Route for admin/manager CRUD

Route::get('/admin/manager', [ManagerController::class , 'list'])->name('admin.manager');


