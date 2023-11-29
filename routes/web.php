<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContatoController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contatos', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/contatos/create', [ContatoController::class, 'create'])->name('contatos.create');
Route::post('/contatos', [ContatoController::class, 'store'])->name('contatos.store'); //metodo de adição
Route::get('/contatos/{contato}', [ContatoController::class, 'show'])->name('contatos.show');
Route::get('/contatos/{contato}/edit', [ContatoController::class, 'edit'])->name('contatos.edit');
Route::put('/contatos/{contato}', [ContatoController::class, 'update'])->name('contatos.update');
Route::delete('/contatos/{contato}', [ContatoController::class, 'destroy'])->name('contatos.destroy');
