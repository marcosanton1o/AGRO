<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantacaoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});
Route::get('/register', function () {
    return view('auth.register')->name('register');
});

Route::get('/dashboard', [PlantacaoController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/plantacoes/create', function () {
    return view('createPlantacao'); 
})->middleware(['auth', 'verified'])->name('createPlantacao');
Route::get('/plantacoes', function () {
    return view('financas');
})->middleware(['auth', 'verified'])->name('plantacaoindex');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/plantacao', [PlantacaoController::class, 'index'])->name('plantacaoindex');
    Route::get('/plantacao/{plantacao}', [PlantacaoController::class, 'show'])->name('plantacaoshow');
    Route::get('/plantacao/create', [PlantacaoController::class, 'create'])->name('plantacaocreate');
    Route::post('/plantacao', [PlantacaoController::class, 'store'])->name('plantacaostore');
    Route::get('/plantacao/{plantacao}/edit', [PlantacaoController::class, 'edit'])->name('plantacaoedit');
    Route::put('/plantacao/{plantacao}', [PlantacaoController::class, 'update'])->name('plantacaoupdate');
    Route::delete('/plantacoes/{plantacao}', [PlantacaoController::class, 'destroy'])->name('plantacaodelete');
});

require __DIR__.'/auth.php';
