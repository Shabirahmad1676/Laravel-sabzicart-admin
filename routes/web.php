<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

// Health check for tracking deployment stability
Route::get('/health', function () {
    return [
        'status' => 'ok',
        'app' => config('app.name'),
        'environment' => app()->environment(),
        'php' => PHP_VERSION,
        'users_in_database' => \App\Models\User::count(),
    ];
});

Route::get('/todos', [TodoController::class, 'index'])
    ->name('todos.index');

Route::post('/todos', [TodoController::class, 'store'])
    ->name('todos.store');

Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle'])
    ->name('todos.toggle');
