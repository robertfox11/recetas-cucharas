<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    public function index(){
        $recetas = Receta::with('categoria')->get();
        return view('recetas.index', compact('recetas'));
    }
    public function createReceta(){
        $categorias = CategoriaReceta::all();
        return view('recetas.create', compact('categorias'));
    }
    public function storeReceta(Request $request){
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'instrucciones_preparacion' => 'required',
            'tiempo_preparacion' => 'required|integer',
            'tiempo_coccion' => 'required|integer',
            'porciones' => 'required|integer',
            'dificultad' => 'required',
            'categoria_id' => 'required|exists:categoria_recetas,id',
            // Agrega aquí las validaciones para los ingredientes y fotos si lo deseas
        ]);
        //dd($request->);
        // Crear la nueva receta
        $receta = new Receta([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'instrucciones_preparacion' => $request->instrucciones_preparacion,
            'tiempo_preparacion' => $request->tiempo_preparacion,
            'tiempo_coccion' => $request->tiempo_coccion,
            'porciones' => $request->porciones,
            'dificultad' => $request->dificultad,
            'categoria_id' => $request->categoria_id,
            'calificacion_promedio' => 0, // Valor predeterminado
        ]);
        // Verificar si la receta se creó correctamente
        if (!$receta->save()) {
            // Si no se pudo guardar la receta, manejar el error adecuadamente
            // Por ejemplo, puedes redirigir de nuevo al formulario con un mensaje de error
            return redirect()->back()->with('error', 'Error al crear la receta.');
        }

        // Obtener los ingredientes ingresados por el usuario
        $ingredientes = $request->input('ingredientes');
        $ingredientes = preg_split("/[\n,]+/", $ingredientes); // Separar los ingredientes por saltos de línea o comas

        // Crear los ingredientes y obtener sus IDs
        $ingredientesIDs = [];

        foreach ($ingredientes as $nombre) {
            $nombre = trim($nombre); // Eliminar espacios en blanco al inicio y final del nombre
            $ingrediente = Ingrediente::firstOrCreate(['nombre_ingrediente' => $nombre]);
            $ingredientesIDs[] = $ingrediente->id;
        }

        // Asignar los ingredientes a la receta
        $receta->ingredientes()->attach($ingredientesIDs);
        return redirect()->route('recetas')->with('success', 'Receta creada exitosamente.');
    }

}
