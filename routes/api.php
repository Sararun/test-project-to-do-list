<?php


use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('/', [TaskController::class, 'create'])->name('tasks.create');
    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});