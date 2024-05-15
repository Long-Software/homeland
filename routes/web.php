<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/properties/price', [PropertyController::class, 'price'])->name('properties.price');
Route::get('/properties/request', [PropertyController::class, 'all_request'])->name('properties.request.index');
Route::get('/properties/save', [PropertyController::class, 'all_save'])->name('properties.save.index');
Route::post('/properties/search', [PropertyController::class, 'search'])->name('properties.search');

Route::resource('properties', PropertyController::class);
Route::post('/properties/{id}/request', [PropertyController::class, 'request'])->name('properties.request.store');
Route::get('/properties/{id}/save', [PropertyController::class, 'save'])->name('properties.save.store');
Route::get('/properties/type/{type}', [PropertyController::class, 'type'])->name('properties.type');
