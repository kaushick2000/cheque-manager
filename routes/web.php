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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::match(['get', 'post'], 'cheque/query', [App\Http\Controllers\ChequeController::class, 'query'])->name('cheque.query');
Route::get('cheque/download', [App\Http\Controllers\ChequeController::class, 'download'])->name('cheque.download');
Route::resource('cheque', App\Http\Controllers\ChequeController::class);
