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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Cupom', 'Cadastro\CupomControll');
Route::resource('Produto', 'Cadastro\ProdutoControll');
Route::resource('Grupo', 'Cadastro\GrupoControll');
Route::resource('Taxa', 'Cadastro\TaxaControll');
