<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

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

Route::prefix('task')->group(function() {
    Route::post('/create', [TaskController::class, 'createAction'])->name('task.createAction');
    
    Route::post('/update/{id}', [TaskController::class, 'updateAction'])->name('task.updateAction');
    
    Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});
