<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;

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
})->name('home');

Route::resource('/products', ProdutoController::class);
Route::resource('/estados', EstadoController::class);
Route::resource('/cidade', CidadeController::class);
/*Route::get('/produtos/{id}', function ($id) {
    $produtos = Produto::all();
    $product = $produtos->where('id', $id);
    return view('produtos', [
        'produtos' => $product
    ]);
});*/