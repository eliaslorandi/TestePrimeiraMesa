<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContatoController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contatos/search', [ContatoController::class, 'searchByName'])->name('contatos.search');//antes de .index para realizar a busca
Route::get('/contatos', [ContatoController::class, 'index'])->name('contatos.index');
Route::get('/contatos/create', [ContatoController::class, 'create'])->name('contatos.create');
Route::post('/contatos', [ContatoController::class, 'store'])->name('contatos.store'); //metodo de adição
Route::get('/contatos/{contato}', [ContatoController::class, 'show'])->name('contatos.show');
Route::get('/contatos/{contato}/edit', [ContatoController::class, 'edit'])->name('contatos.edit');
Route::put('/contatos/{contato}', [ContatoController::class, 'update'])->name('contatos.update');
Route::delete('/contatos/{contato}', [ContatoController::class, 'destroy'])->name('contatos.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});
