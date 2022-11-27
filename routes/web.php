<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('create_blog');
Route::get('/blog/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit_blog');
Route::get('/blog/delete/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('delete_blog');
Route::get('/blog/update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update_blog');
Route::post('/blog/store', [App\Http\Controllers\BlogController::class, 'store']);
