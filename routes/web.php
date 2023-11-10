<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Home routes

Route::get('/', [HomeController::class, 'index'])->name('home');

//ToDO routes

Route::prefix('/todo')->group(function () {
    Route::get('/', [ToDoController::class, 'index'])->name('todo');
    Route::post('/store', [ToDoController::class, 'store'])->name('todo.store');
    // Route::get('/edit/{id}', [ToDoController::class, 'edit'])->name('todo.edit');
    // Route::put('/update/{id}', [ToDoController::class, 'update'])->name('todo.update');
    // Route::delete('/delete/{id}', [ToDoController::class, 'destroy'])->name('todo.destroy');
});
