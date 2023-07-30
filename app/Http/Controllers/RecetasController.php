<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    public function index(){
        $recetas = Receta::all();
        dd($recetas);
        return view('recetas.index', compact('recetas'));
    }
}
