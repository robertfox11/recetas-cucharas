@csrf
<div class="md:flex py-2">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="nombre_categoria">
            Categoria
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" id="nombre_categoria" name="nombre_categoria" type="text" value="{{ old('nombre_categoria') }}">
        <p class="py-2 text-sm text-gray-600">Crea tu Categoría</p>
    </div>
</div>
<div class="md:flex ">
    <div class="md:w-1/3"></div>
    <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Guarda Categoría
    </button>
</div>

