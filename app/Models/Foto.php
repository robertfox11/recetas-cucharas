<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['receta_id','url_image'];
    use HasFactory;
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
