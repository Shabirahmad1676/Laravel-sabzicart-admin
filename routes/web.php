<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/todos', [TodoController::class, 'index'])
    ->name('todos.index');

Route::post('/todos', [TodoController::class, 'store'])
    ->name('todos.store');

Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle'])
    ->name('todos.toggle');
