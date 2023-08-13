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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container w-full flex flex-wrap mx-auto px-2 pt-4 lg:pt-1 mt-2">
                        <!--Section container-->
                        <section class="w-full lg:w-full">
                            <div id='section2' class="p-2  lg:mt-0 rounded shadow bg-white">
                                <form action="{{ route('recetas.store') }}" method="POST">
                                   @csrf
                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3">
                                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="titulo">
                                                Titulo
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <input class="form-input block w-full focus:bg-white" id="titulo" name="titulo" type="text" value="{{ old('titulo') }}">
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
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
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
                                            <textarea class="form-textarea block w-full focus:bg-white" name="descripcion" id="descripcion"  value="{{ old('descripcion') }}" rows="8"></textarea>
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
                                            <textarea name="instrucciones_preparacion" class="form-textarea block w-full focus:bg-white" value="{{ old('instrucciones_preparacion') }}"  name="instrucciones_preparacion" id="instrucciones_preparacionrows="8"></textarea>
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
                                            <input class="form-input block w-full focus:bg-white" name="tiempo_preparacion" id="tiempo_preparacion" type="number" value="{{ old('tiempo_preparacion') }}" >
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
                                            <input class="form-input block w-full focus:bg-white" name="tiempo_coccion" id="tiempo_coccion" type="number" value="{{ old('tiempo_coccion') }}">
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
                                            <input class="form-input block w-full focus:bg-white" name="porciones" id="porciones" type="number" value="{{ old('porciones') }}">
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
                                                        <option value="{{$df}}">{{$df}}</option>
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
                                            <textarea name="ingredientes" class="form-textarea block w-full focus:bg-white" id="ingredientes" value="{{ old('ingredientes') }}"    rows="8"></textarea>
                                            <small class="form-text text-muted">Ingrese los ingredientes separados por saltos de línea o comas.</small>
                                        </div>
                                    </div>
                                    <div class="md:flex mb-6">
                                        <div class="md:w-1/3"></div>
                                        <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
