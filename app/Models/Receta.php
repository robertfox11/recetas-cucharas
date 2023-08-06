<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'recetas';
    protected $fillable = [
        'titulo',
        'descripcion',
        'instrucciones_preparacion',
        'tiempo_preparacion',
        'tiempo_coccion',
        'porciones',
        'dificultad',
        'calificacion_promedio',
        'categoria_id',
        // Agrega aquí más atributos que puedan ser asignados en masa
    ];
    public static function create(array $array)
    {
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class, 'categoria_id');

    }
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingrediente_receta', 'receta_id', 'ingrediente_id');
    }
}
