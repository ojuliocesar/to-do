<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth')->group(function() {
    
    Route::get('/', [ HomeController::class, 'index'])->name('home');

    Route::prefix('task')->group(function() {

        Route::get('/', [TaskController::class, 'index'])->name('task.show');
        Route::get('/new', [TaskController::class, 'create'])->name('task.create');
        Route::get('/update/{id}', [TaskController::class, 'update'])->name('task.update');
    
    });
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
