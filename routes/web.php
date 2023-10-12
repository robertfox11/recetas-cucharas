<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('storage:link', function () {
    if (!file_exists(storage_path('seeds_executed'))) {
        // Ejecuta el comando solo si el archivo de marca no existe
        Artisan::call('db:seed');

        // Crea un archivo de marca para indicar que el comando se ha ejecutado
        file_put_contents(storage_path('seeds_executed'), 'Executed');
    }

    return 'Storage link';
});

require __DIR__.'/Webrecetas.php';

require __DIR__.'/auth.php';
require __DIR__.'/categoria.php';
require __DIR__.'/recetas.php';

