<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Foto;
use App\Models\Ingrediente;
use App\Models\Ingrediente_Receta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Object_;

class RecetasController extends Controller
{
    public function index(){
        $recetas = Receta::with('categoria')->get();
        return view('recetas.index', compact('recetas'));
    }
    public function createReceta(Receta $receta){

        $categorias = CategoriaReceta::all();
        $receta = new Receta();
        $ingredientesNombres = "";
        $dificultadades = Receta::getPossibleEnumValues('dificultad');
        return view('recetas.create', compact('categorias', 'dificultadades', 'receta', 'ingredientesNombres'));
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

    public function editReceta($id){
        // Obtener la receta por su ID
        $receta = Receta::findOrFail($id);
        $dificultadades = Receta::getPossibleEnumValues('dificultad');
        $cat = CategoriaReceta::findOrFail($receta->categoria_id);
        $categorias = CategoriaReceta::all();
        $ingredientesReceta = Ingrediente_Receta::where('receta_id', $id)->get();
        // Obtener los IDs de ingredientes relacionados con la receta
        $ingredientesIds = $ingredientesReceta->pluck('ingrediente_id')->toArray();
        // Obtener los modelos completos de los ingredientes relacionados
        $ingredientes = Ingrediente::whereIn('id', $ingredientesIds)->get();
        $ingredientesNombres = $ingredientes->pluck('nombre_ingrediente')->implode(", "); // Obtiene los nombres de los ingredientes y los une con saltos de línea
        return view('recetas.edit', compact('cat', 'dificultadades','categorias','receta', 'ingredientesNombres'));

    }
    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'instrucciones_preparacion' => 'required',
            'tiempo_preparacion' => 'required|integer',
            'tiempo_coccion' => 'required|integer',
            'porciones' => 'required|integer',
            'dificultad' => 'in:Difícil,Moderada,Fácil',
            'categoria_id' => 'required|exists:categoria_recetas,id',
            // Agrega aquí las validaciones para los ingredientes y fotos si lo deseas
        ]);

        $receta = Receta::findOrFail($id);
        if (!$receta) {
            $this->error("Receta with ID {$id} not fou  nd.");
            return;
        }
        try {
            $actualizado = $receta->update([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'instrucciones_preparacion' => $request->instrucciones_preparacion,
                'tiempo_preparacion' => $request->tiempo_preparacion,
                'tiempo_coccion' => $request->tiempo_coccion,
                'porciones' => $request->porciones,
                'dificultad' => $request->dificultad,
                'categoria_id' => $request->categoria_id,
                // Agregar más campos aquí
            ]);
            if ($actualizado){
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
//            // Asignar los ingredientes a la receta
                $receta->ingredientes()->attach($ingredientesIDs);
                return redirect()->route('recetas.edit', ['id' => $id])->with('success', 'Receta actualizada correctamente');
            }
        } catch (\Exception $e) {
            // Si ocurre un error, redirige de vuelta al formulario con un mensaje de error
            return back()->with('error', 'Error al actualizar la receta. Por favor, inténtalo de nuevo.');
        }
    }
}
