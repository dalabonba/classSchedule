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

Route::get('/', [App\Http\Controllers\myController::class, 'show_index'])->name('show_index');
Route::post('/', [App\Http\Controllers\myController::class, 'store_class'])->name('store_class');
Route::get('/setting', [App\Http\Controllers\myController::class, 'show_setting'])->name('show_setting');
Route::post('/setting', [App\Http\Controllers\myController::class, 'store_setting'])->name('store_setting');
