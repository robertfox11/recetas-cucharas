<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaReceta extends Model
{
    use HasFactory;
    protected $table = 'categoria_recetas';
    public function recetas()
    {
        return $this->hasMany(Receta::class, 'categoria_id');
    }
}
