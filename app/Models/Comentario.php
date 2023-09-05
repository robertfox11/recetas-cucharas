<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['receta_id', 'nombre_autor', 'correo_autor', 'contenido','activo_comentario'];
    use HasFactory;
}
