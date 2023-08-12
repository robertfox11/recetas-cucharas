    <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control" required>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
</div>
<div class="mb-3">
    <label for="instrucciones_preparacion" class="form-label">Instrucciones de Preparación</label>
    <textarea name="instrucciones_preparacion" id="instrucciones_preparacion" class="form-control" rows="5" required></textarea>
</div>
<div class="mb-3">
    <label for="tiempo_preparacion" class="form-label">Tiempo de Preparación (minutos)</label>
    <input type="number" name="tiempo_preparacion" id="tiempo_preparacion" class="form-control" required>
</div>
<div class="mb-3">
    <label for="tiempo_coccion" class="form-label">Tiempo de Cocción (minutos)</label>
    <input type="number" name="tiempo_coccion" id="tiempo_coccion" class="form-control" required>
</div>
<div class="mb-3">
    <label for="porciones" class="form-label">Porciones</label>
    <input type="number" name="porciones" id="porciones" class="form-control" required>
</div>
<div class="mb-3">
    <label for="dificultad" class="form-label">Dificultad</label>
    <select name="dificultad" id="dificultad" class="form-select" required>
        <option value="Fácil">Fácil</option>
        <option value="Moderada">Moderada</option>
        <option value="Difícil">Difícil</option>
    </select>
</div>
<div class="mb-3">
    <label for="ingredientes" class="form-label">Ingredientes</label>
    <textarea name="ingredientes" class="form-control" rows="5" required></textarea>
    <!-- Un solo campo para ingresar los nombres de los ingredientes separados por saltos de línea o comas -->
    <small class="form-text text-muted">Ingrese los ingredientes separados por saltos de línea o comas.</small>
</div>
<!-- Agrega aquí los campos para los ingredientes y fotos si lo deseas -->
<button type="submit" class="bg-blue-500">Guardar Receta</button>
