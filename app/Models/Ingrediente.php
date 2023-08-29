<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['nombre_ingrediente'];
    use HasFactory;
    public function recetas()
    {
        return $this->belongsToMany(Receta::class);
    }

}
