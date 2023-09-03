<?php

use App\Http\Controllers\web\RecetasControllerWeb;

Route::get('/', [RecetasControllerWeb::class, 'index'])->name('recetas-web.index');
Route::get('/recetas-cucharas/all', [RecetasControllerWeb::class, 'allCucharas'])->name('recetas-web.all');
Route::get('/receta-cucharas/{nombre_categoria}', [RecetasControllerWeb::class, 'showCucharas'])->name('recetas-show-id');
