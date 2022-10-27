<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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
Route::get('/', [ProfileController::class, 'index']);
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create']);
Route::post('/admin/store', [AdminController::class, 'store']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
Route::put('/admin/update/{id}', [AdminController::class, 'update']);
Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy']);


Route::get('/projects', [ProjectController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/projects', [App\Http\Controllers\HomeController::class, 'projects'])->name('projects');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
Route::put('/home/update/{id}', [App\Http\Controllers\HomeController::class, 'update']);
Route::delete('/home/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);
