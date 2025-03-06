<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userList'])->name('dashboard');
});

//gallery routes
Route::get('/gallery/index', [UserController::class, 'galleryIndex'])->name('gallery.index');
Route::get('/gallery/create', [UserController::class, 'createGallery'])->name('gallery.create');
Route::post('/gallery/upload', [UserController::class, 'upload'])->name('gallery.upload');
