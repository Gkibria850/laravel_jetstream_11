<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::middleware('admin:admin')->group(function(){

Route::get('admin/login', [AdminController::class, 'loginForm']);
Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

});
// Route::prefix('admin')->middleware('admin')->group(function () {
//     Route::get('login', [AdminController::class, 'loginForm']);
//     Route::post('login', [AdminController::class, 'store'])->name('admin.login');
// });


Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
