<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('home');
});


Route::post('/role', [RoleController::class, 'role'])->name('role');

