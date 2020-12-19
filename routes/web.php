<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatacrudController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datacrud', [App\Http\Controllers\DatacrudController::class, 'index'])->name('datacrud');

Route::get('/datacrud/add', [App\Http\Controllers\DatacrudController::class, 'add'])->name('add');
Route::post('/datacrud/store', [App\Http\Controllers\DatacrudController::class, 'store'])->name('store');

Route::get('/datacrud/show/{id}', [App\Http\Controllers\DatacrudController::class, 'show'])->name('show');

Route::get('/datacrud/destroy/{id}', [App\Http\Controllers\DatacrudController::class, 'destroy'])->name('destroy');

Route::get('/datacrud/search', [App\Http\Controllers\DatacrudController::class, 'search'])->name('search');

Route::get('/datacrud/edit/{id}', [App\Http\Controllers\DatacrudController::class, 'edit'])->name('edit');

Route::post('/datacrud/update', [App\Http\Controllers\DatacrudController::class, 'update'])->name('update');
// Route::put('user/{id}', 'UserController@update');