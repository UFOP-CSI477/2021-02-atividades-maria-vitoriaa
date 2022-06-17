<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\ColetaController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/relatorio_entidades', 'App\Http\Controllers\ColetaController@relatorioEntidades')->name('relatorio_entidades');
Route::get('/relatorio_items', 'App\Http\Controllers\ColetaController@relatorioItems')->name('relatorio_entidades');

Route::resource('/items', ItemController::class)->middleware('auth');
Route::resource('/entidades', EntidadeController::class)->middleware('auth');
Route::resource('/coletas', ColetaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
