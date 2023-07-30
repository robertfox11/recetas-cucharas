<?php

use App\Http\Controllers\RecetasController;


Route::get('/recetas', [RecetasController::class, 'index'])->name('recetas');
