<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Home routes

Route::get('/', [HomeController::class, 'index'])->name('home');

//ToDO routes
Route::prefix('/todo')->group(function () {
    Route::get('/', [ToDoController::class, 'index'])->name('todo');
    Route::post('/store', [ToDoController::class, 'store'])->name('todo.store');
    Route::get('/edit', [ToDoController::class, 'edit'])->name('todo.edit');
    Route::get('/updateTask/{task_id}', [ToDoController::class, 'statusUpdate'])->name('todo.updateStatus');
    Route::get('/update/{task_id}', [ToDoController::class, 'update'])->name('todo.update');
    Route::get('/delete/{task_id}', [ToDoController::class, 'delete'])->name('todo.delete');
});

//Banner routes
Route::prefix('/banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('/updateBanner/{banner_id}', [BannerController::class, 'statusUpdate'])->name('banner.updateStatus');
    Route::get('/update/{banner_id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/delete/{banner_id}', [BannerController::class, 'delete'])->name('banner.delete');
});

