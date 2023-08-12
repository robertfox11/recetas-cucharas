<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Receta') }}
            </div>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border border-indigo-400">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <div class="container w-full flex flex-wrap mx-auto px-2 pt-4 lg:pt-1 mt-2">
                        <!--Section container-->
                        <section class="w-full lg:w-full">
                            <div id='section2' class="p-2  lg:mt-0 rounded shadow bg-white">
                                <form action="{{ route('recetas.store') }}" method="POST">
                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                                Titulo
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input class="form-input block w-full focus:bg-white" id="my-textfield" type="text" value="">
                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                                        </div>
                                    </div>

                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label for="categoria_id"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                                                Categoría
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <select id="categoria_id" name="categoria_id" class="form-select block w-full focus:bg-white" id="my-select">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                                                @endforeach
                                            </select>
                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                                        </div>
                                    </div>

                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label for="descripcion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                                Descripción
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <textarea class="form-textarea block w-full focus:bg-white" id="my-textarea" value="" rows="8"></textarea>
                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                                        </div>
                                    </div>
                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label for="instrucciones_preparacion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                                Instrucciónes de preparación
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <textarea name="instrucciones_preparacion" class="form-textarea block w-full focus:bg-white" id="instrucciones_preparacion" value="" rows="8"></textarea>
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
                                            <input class="form-input block w-full focus:bg-white" id="tiempo_preparacion" type="number" value="0">
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
                                            <input class="form-input block w-full focus:bg-white" id="tiempo_coccion" type="number" value="0">
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
                                            <input class="form-input block w-full focus:bg-white" id="porciones" type="number" value="0">
                                            <p class="py-2 text-sm text-gray-600">Porciones</p>
                                        </div>
                                    </div>
                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label for="dificultad"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                                                Dificultad
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <select id="dificultad" name="categoria_id" class="form-select block w-full focus:bg-white" id="my-select">
                                                <option value="Fácil">Fácil</option>
                                                <option value="Moderada">Moderada</option>
                                                <option value="Difícil">Difícil</option>
                                            </select>
                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center">
                                        <div class="md:w-1/3"></div>
                                        <div class="md:w-2/3">
                                            <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                            <h2>Nueva Receta</h2>
                        <form action="{{ route('recetas.store') }}" method="POST">
                            @csrf
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
