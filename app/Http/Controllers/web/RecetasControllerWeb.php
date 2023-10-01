<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CategoriaReceta;
use App\Models\Comentario;
use App\Models\Foto;
use App\Models\Ingrediente;
use App\Models\Ingrediente_Receta;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasControllerWeb extends Controller
{
    public function index(){
        $categorias = CategoriaReceta::take(9)->get();
        $recetas = Receta::with('categoria')->orderBy('id','desc')->get();
        $recetas->load('fotos');
        foreach ($recetas as $r){
            $cat_url = str_replace(" ", "-", $r->titulo);
            $r->url = $cat_url;
        }
        return view('web.index', compact('categorias', 'recetas'));
    }

    public function allCucharas(){
        $recetas = Receta::with('categoria')->orderBy('id','desc')->get();
        $recetas->load('fotos');
        return view('recetas.web.cucharas', compact('recetas'));
    }
    public function showCucharasBycategory($categoriaNombre){
        $categorias = CategoriaReceta::take(9)->get();
        $categoria = CategoriaReceta::where('nombre_categoria', $categoriaNombre)->first();
        if (!$categoria) {
            // Maneja el caso en que la categoría no exista
            return abort(404);
        }
        // Obtén todas las recetas asociadas a esta categoría
        $recetas = $categoria->recetas;
        // Carga las imágenes relacionadas para cada receta
        $recetas->load('fotos');
        foreach ($recetas as $r){
            $cat_url = str_replace(" ", "-", $r->titulo);
            $r->url = $cat_url;
        }
        return view('web.cucharas-categoria', compact('recetas', 'categorias', 'categoriaNombre'));
    }

    public function showRecetas($cat_url){
        // Obtener la receta por su ID
        $nombre_receta = str_replace("-", " ", $cat_url);
        $receta = Receta::where('titulo', $nombre_receta)->first();
        if (!$receta) {
            // Maneja el caso en que la categoría no exista
            return abort(404);
        }
        $dificultadades = Receta::getPossibleEnumValues('dificultad');

        $cat = CategoriaReceta::findOrFail($receta->categoria_id);
        $categorias = CategoriaReceta::take(9)->get();
        $ingredientesReceta = Ingrediente_Receta::where('receta_id', $receta->id)->get();
        // Obtener los IDs de ingredientes relacionados con la receta
        $ingredientesIds = $ingredientesReceta->pluck('ingrediente_id')->toArray();
        // Obtener los modelos completos de los ingredientes relacionados
        $ingredientes = Ingrediente::whereIn('id', $ingredientesIds)->get();
        $ingredientesNombres = $ingredientes->pluck('nombre_ingrediente'); // Obtiene los nombres de los ingredientes y los une con saltos de línea
        $pasos = explode(";", $receta->instrucciones_preparacion);
        $pasos = array_map('trim', $pasos);
        $receta->instrucciones_preparacion = array_filter($pasos);
        //obtener las imagenes
        $fotos = Foto::where('receta_id', $receta->id)->get();
        $comentarios = Comentario::where('receta_id', $receta->id) ->where('activo_comentario', true)->get();
        return view('web.recetas-cucharas-show', compact('cat', 'dificultadades','categorias','receta', 'ingredientesNombres', 'fotos', 'nombre_receta', 'comentarios'));
    }

    public function recetaComentario(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|string',
            'correo_autor' => 'required|email|max:255',
        ]);
        // Crear una nueva instancia de Comentario con los datos validados
        $comentario = new Comentario([
            'receta_id' => $request->input('receta_id'),
            'nombre_autor' => $request->input('nombre'),
            'correo_autor' => $request->input('correo_autor'),
            'contenido' => $request->input('contenido'),
        ]);
        if (!$comentario->save()) {
            // Si no se pudo guardar la receta, manejar el error adecuadamente
            return redirect()->back()->with('error', 'Error al crear la receta.');
        }
        return redirect()->back()->with('success', 'Comentario enviado con éxito, en espera ha ser validado.');
    }

    public function terminoServicio(){
        $categorias = CategoriaReceta::take(9)->get();
        return view('web.terminos-servicio', compact('categorias'));
    }
}
