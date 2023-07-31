<?php

use Illuminate\Support\Facades\Route;
use App\Models\Items as Item;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $items = Item::get();
    return view('welcome')->with('items', $items);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('todos/index', [App\Http\Controllers\TodoController::class, 'index'])->name('todoIndex');
Route::get('todos/create', [App\Http\Controllers\TodoController::class, 'create'])->name('todos/create');
Route::post('todos/save', [App\Http\Controllers\TodoController::class, 'storeTodo'])->name('todos/save');
Route::get('todos/edit/{id}', [App\Http\Controllers\TodoController::class, 'edit'])->name('todos/edit');
Route::post('todos/editSave', [App\Http\Controllers\TodoController::class, 'editSave'])->name('todos/editSave');
Route::get('todos/delete/{id}', [App\Http\Controllers\TodoController::class, 'delete'])->name('todosDelete');

Route::get('/redisTest', [App\Http\Controllers\HomeController::class, 'show'])->name('redis');
