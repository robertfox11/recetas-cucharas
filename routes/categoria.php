<?php

use App\Http\Controllers\CategoriaController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/categoria', [CategoriaController::class, 'create'])->name('categoria.create');

    Route::post('/categoria-create', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::post('/update-categoria', [CategoriaController::class, 'update'])->name('categoria.update');
});
