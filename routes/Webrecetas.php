<?php

use App\Http\Controllers\web\RecetasControllerWeb;

Route::get('/', [RecetasControllerWeb::class, 'index'])->name('recetas-web.index');
Route::get('/recetas-cucharas/all', [RecetasControllerWeb::class, 'allCucharas'])->name('recetas-web.all');
Route::get('/receta-cucharas/categoria/{nombre_categoria}', [RecetasControllerWeb::class, 'showCucharasBycategory'])->name('recetas-by-categoria.id');
Route::get('/receta-cucharas/{nombre_receta}', [RecetasControllerWeb::class, 'showRecetas'])->name('recetas.show');
Route::post('/receta-cucharas/comentario', [RecetasControllerWeb::class, 'recetaComentario'])->name('receta_comentario');
Route::get('/terminos-servicio', [RecetasControllerWeb::class, 'terminoServicio'])->name('receta_terminos_de_servicio');


