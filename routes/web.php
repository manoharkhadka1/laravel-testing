<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::post('/articles/create', [App\Http\Controllers\ArticleController::class, 'store']);
Route::get('/articles/{article}', [App\Http\Controllers\ArticleController::class, 'show']);

