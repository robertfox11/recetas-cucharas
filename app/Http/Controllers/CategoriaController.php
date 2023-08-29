<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function create(){
        $categorias = CategoriaReceta::orderBy('nombre_categoria', 'asc')->get();;
        return view('categoria.create', compact('categorias'));
    }
    public function store(Request $request){
        $request->validate([
            'nombre_categoria' => 'required']);

        $categoria = new CategoriaReceta([
            'nombre_categoria' => $request->nombre_categoria,
        ]);
        // Verificar si la receta se creó correctamente
        if (!$categoria->save()) {
            // Si no se pudo guardar la categoria
            return redirect()->back()->with->with('error', 'Error al crear la Categoria.');
        }
        return redirect()->back()->with('success', 'Categoría creada exitosamente.');
    }
}
