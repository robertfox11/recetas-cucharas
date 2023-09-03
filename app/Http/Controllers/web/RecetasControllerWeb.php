<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CategoriaReceta;
use App\Models\Foto;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasControllerWeb extends Controller
{
    public function index(){
        $categorias = CategoriaReceta::take(9)->get();
        $recetas = Receta::with('categoria')->orderBy('id','desc')->get();
        $recetas->load('fotos');
        return view('web.index', compact('categorias', 'recetas'));
    }

    public function allCucharas(){
        $recetas = Receta::with('categoria')->orderBy('id','desc')->get();
        $recetas->load('fotos');
        return view('recetas.web.cucharas', compact('recetas'));
    }
    public function showCucharas($categoriaNombre){
        $categorias = CategoriaReceta::take(9)->get();
        // Obtén la categoría por su ID
//        $categoria = CategoriaReceta::find($categoriaId);
        $categoria = CategoriaReceta::where('nombre_categoria', $categoriaNombre)->first();
        if (!$categoria) {
            // Maneja el caso en que la categoría no exista
            return abort(404);
        }
        // Obtén todas las recetas asociadas a esta categoría
        $recetas = $categoria->recetas;
        // Carga las imágenes relacionadas para cada receta
        $recetas->load('fotos');
//        dd($recetas);
        return view('recetas.cucharas-categoria', compact('recetas', 'categorias', 'categoriaNombre'));
    }
}
