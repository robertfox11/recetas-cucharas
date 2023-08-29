<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente_Receta extends Model
{
    protected $table = 'ingrediente_receta';
    protected $fillable = [
        'receta_id', 'ingrediente_id'
    ];
    use HasFactory;
}
