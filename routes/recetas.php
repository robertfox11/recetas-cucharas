<?php

use App\Http\Controllers\RecetasController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/recetas', [RecetasController::class, 'index'])->name('recetas');
    Route::get('/create-receta', [RecetasController::class, 'createReceta'])->name('recetas-create');
    Route::post('/store-receta', [RecetasController::class, 'storeReceta'])->name('recetas.store');
    Route::get('/edit-receta/{id}', [RecetasController::class, 'editReceta'])->name('recetas.edit');
});


