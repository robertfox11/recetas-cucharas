<?php

namespace App\Console\Commands;

use App\Models\Receta;
use Illuminate\Console\Command;

class UpdateRecetas extends Command
{
    protected $signature = 'receta:update {id}';
    protected $description = 'Update a specific receta by ID';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');

        $receta = Receta::find($id);
        if (!$receta) {
            $this->error("Receta with ID {$id} not found.");
            return;
        }

        // Actualiza los valores aquí
        $receta->update([
            'titulo' => 'Nuevo Título',
            'descripcion' => 'Nueva Descripción',
            // ... otros campos y valores nuevos
        ]);

        $this->info("Receta {$id} updated successfully.");
    }
}
