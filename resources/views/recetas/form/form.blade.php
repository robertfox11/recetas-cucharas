@csrf
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="titulo">
            Titulo
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" id="titulo" name="titulo" type="text" value="{{ old('titulo', $receta->titulo) }}">
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>

<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="categoria_id"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Categoría
        </label>
    </div>
    <div class="md:w-2/3">
        <select id="categoria_id" name="categoria_id" class="form-select block w-full focus:bg-white">
            @foreach($categorias as $categoria)
                <option {{ old("categoria_id", $receta->categoria_id) == $categoria->id ? "selected": "" }}  value="{{$categoria->id}}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>

<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="descripcion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">
            Descripción
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea class="form-textarea block w-full focus:bg-white" name="descripcion" id="descripcion" rows="8">{{ old('descripcion', $receta->descripcion) }}</textarea>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="instrucciones_preparacion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Instrucciónes de preparación
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea name="instrucciones_preparacion" class="form-textarea block w-full focus:bg-white"  id="instrucciones_preparacionrows" rows="8">{{ old('instrucciones_preparacion', $receta->instrucciones_preparacion) }}
        </textarea>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tiempo_preparacion">
            Tiempo de preparación
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="tiempo_preparacion" id="tiempo_preparacion" type="number" min="0" max="999" value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" >
        <p class="py-2 text-sm text-gray-600">Tiempo de Preparación (minutos)</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tiempo_coccion">
            Tiempo de Cocción
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="tiempo_coccion" id="tiempo_coccion" type="number" min="0" max="999" value="{{ old('tiempo_coccion', $receta->tiempo_coccion) }}">
        <p class="py-2 text-sm text-gray-600">Tiempo de Cocción (minutos)</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="porciones">
            Porciones
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="porciones" id="porciones" type="number" value="{{ old('porciones', $receta->porciones) }}">
        <p class="py-2 text-sm text-gray-600">Porciones</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="dificultad"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">
            Dificultad
        </label>
    </div>
    <div class="md:w-2/3">
        <select id="dificultad" name="dificultad" class="form-select block w-full focus:bg-white" >
            @foreach($dificultadades as $df)
                <option {{ old("dificultad") == $df ? "selected": "" }}  value="{{$df}}">{{$df}}</option>
            @endforeach
        </select>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="ingredientes" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Ingredientes
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea name="ingredientes" class="form-textarea block w-full focus:bg-white" id="ingredientes" rows="8">{{ old('ingredientes', $ingredientesNombres) }}</textarea>
        <small class="form-text text-muted">Ingrese los ingredientes separados por saltos de línea o comas.</small>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3"></div>
    <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Save
    </button>
</div>
