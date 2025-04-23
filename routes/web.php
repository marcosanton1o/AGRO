<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});
Route::get('/register', function () {
    return view('auth.register')->name('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/plantacao', [PlantacaoController::class, 'index'])->name('plantacaoindex');
    Route::get('/plantacao/{plantacao}', [PlantacaoController::class, 'show'])->name('plantacaoshow');
    Route::get('/plantacao/create', [PlantacaoController::class, 'create'])->name('plantacaocreate');
    Route::post('/plantacoes', [PlantacaoController::class, 'store'])->name('plantacaostore');
    Route::get('/plantacao/{plantacao}/edit', [PlantacaoController::class, 'edit'])->name('plantacaoedit');
//está plantaca porque se não da erro
    Route::put('/plantacao/{plantaca}', [PlantacaoController::class, 'update'])->name('plantacaoupdate');
    Route::delete('/plantacoes/{plantacao}', [PlantacaoController::class, 'destroy'])->name('plantacaodelete');
});

Route::middleware('auth')->group(function () {
    Route::get('/semente', [SementeController::class, 'index'])->name('sementeindex');
    Route::get('/semente/{semente}', [SementeController::class, 'show'])->name('sementeshow');
    Route::get('/semente/create', [SementeController::class, 'create'])->name('sementecreate');
    Route::post('/sementes', [SementeController::class, 'store'])->name('sementestore');
    Route::get('/semente/{semente}/edit', [SementeController::class, 'edit'])->name('sementeedit');
//está plantaca porque se não da erro
    Route::put('/semente/{sement}', [SementeController::class, 'update'])->name('sementeupdate');
    Route::delete('/sementes/{semente}', [SementeController::class, 'destroy'])->name('sementedelete');
});

require __DIR__.'/auth.php';
