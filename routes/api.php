<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Auth::routes();


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('auth:sanctum')->group( function(){

    // --- API Routes
    Route::get('tasks', [App\Http\Controllers\Api\TaskApiController::class, 'index']);
    Route::get('tasks/{id}', [App\Http\Controllers\Api\TaskApiController::class, 'index'])->name('api.tasks.single.view');
    // Route::get('tasks/create', [App\Http\Controllers\Api\TaskApiController::class, 'create'])->name('api.tasks.create');
    Route::post('tasks/store', [App\Http\Controllers\Api\TaskApiController::class, 'store'])->name('api.tasks.store');
    // Route::get('tasks/edit/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'edit'])->name('api.tasks.edit');
    Route::post('tasks/update/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'update'])->name('api.tasks.update');
    Route::delete('tasks/delete/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'destroy'])->name('api.tasks.delete');

    Route::get('task-lists', [App\Http\Controllers\Api\TaskListApiController::class, 'index'])->name('api.task-lists.view');
    Route::get('task-lists/{id}', [App\Http\Controllers\Api\TaskListApiController::class, 'index'])->name('api.task-lists.single.view');
    // Route::get('task-lists/create', [App\Http\Controllers\Api\TaskListApiController::class, 'create'])->name('api.task-lists.create');
    Route::post('task-lists/store', [App\Http\Controllers\Api\TaskListApiController::class, 'store'])->name('api.task-lists.store');
    // Route::get('task-lists/edit/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'edit'])->name('api.task-lists.edit');
    Route::post('task-lists/update/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'update'])->name('api.task-lists.update');
    Route::delete('task-lists/delete/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'destroy'])->name('api.task-lists.delete');


});


