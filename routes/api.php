<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function() {

    Route::prefix('task')->group(function() {
        Route::post('/create', [TaskController::class, 'createAction'])->name('task.createAction');
        
        Route::post('/update/{id}', [TaskController::class, 'updateAction'])->name('task.updateAction');
        
        Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
    
        Route::post('/isDone', [TaskController::class, 'isDone']);
    });

    Route::post('/alterDate', [HomeController::class, 'alterDate']);

});

Route::prefix('auth')->group(function() {
    Route::post('/register', [AuthController::class, 'registerAction'])->name('auth.registerAction');
    Route::post('/login', [AuthController::class, 'loginAction'])->name('auth.loginAction');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});
