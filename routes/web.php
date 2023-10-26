<?php

use App\Http\Controllers\UploadController;
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

Route::get('/', [UploadController::class, 'ListUploadArquivos'])->name('upload.list');


Auth::routes();

Route::get('/upload', [UploadController::class, 'create'])->name('upload.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



