@extends('web.master')
@section('content')
    <section class="bg-white shadow">
        <div class="container mx-auto">
            <div id="destados_recetas" class="mx-4">
                <div class="w-full p-8">
                    <div class="container mx-auto p-4">
                        <h1 class="text-3xl font-semibold mb-4 uppercase">{{$nombre_receta}}</h1>
                        @if ($receta->fotos->count() > 0)
                            <img class="rounded-lg mx-auto object-fill h-96 w-4/5 " src="{{ asset('storage/' . $receta->fotos->first()->url_image) }}" alt="{{ $receta->fotos->first()->id }}">
                        @endif
                        <!-- Descripción de la Receta -->
                        <div class="py-4 text-2xl grid-cols-1 gap-4 mb-2">
                            <p><strong>Tiempo de preparación: {{$receta->tiempo_preparacion}} minutos</strong></p>
                            <h2 class="font-semibold mb-2 text-red-500">Descripción</h2>
                            <p class="text-gray-700 mb-4 text-xl text-justifyz">{{$receta->descripcion}}</p>
                            <!-- Ingredientes -->
                            <h2 class="font-semibold mb-2 text-red-500">Ingredientes</h2>
                            <ul class="max-w-7xl space-y-1 text-gray-500 list-inside dark:text-gray-400 text-xl grid grid-cols-3  text-center">
                                @foreach($ingredientesNombres as $in)
                                        <li class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>{{$in}}
                                        </li>
                                @endforeach
                            </ul>
                            <!-- Instrucciones de Preparación -->
                            <h2 class="font-semibold my-2 text-red-500">Instrucciones de Preparación</h2>
                            <ol class="list-decimal max-w-7xl space-y-1 text-gray-500 list-inside dark:text-gray-400 text-xl">
                                @foreach($receta->instrucciones_preparacion as $recprepa => $i)
                                    <li class="flex  items-center">
                                        Paso {{$i}}
                                    </li>
                                @endforeach
                            </ol>
                            <!-- Tiempo de Preparación y Cocción -->
                            <div class="max-w-2xl flex justify-between my-4">
                                <div>
                                    <p class="font-semibold text-red-500">Tiempo de Preparación:</p>
                                    <p class="text-gray-700 mb-4 text-xl ">{{$receta->tiempo_preparacion}} minutos</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-500">Tiempo de Cocción:</p>
                                    <p class="text-gray-700 mb-4 text-xl ">{{$receta->tiempo_coccion}} minutos</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-500">Porciones:</p>
                                    <p class="text-gray-700 mb-4 text-xl ">{{$receta->porciones}} personas</p>
                                </div>
                            </div>
                            <!-- Dificultad -->
                            <p class="font-semibold text-red-500">Dificultad:</p>
                            <p class="text-gray-700 mb-4 text-xl ">{{ $receta->dificultad}}</p>

                            <!-- Calificación Promedio -->
                            <p class="font-semibold text-red-500">Calificación Promedio:</p>
                            <p class="text-gray-700 mb-4 text-xl ">{{ $receta->calificacion_promedio}}  (10 reseñas)</p>

                            <!-- Categoría de la Receta -->
                            <p class="font-semibold mt-4 text-red-500">Categoría de la Receta:</p>
                            <p class="text-gray-700 mb-4 text-xl ">{{$cat->nombre_categoria}}</p>

                            <!-- Comentarios de la Receta -->
                            <h2 class="text-xl font-semibold my-4 text-blue-700">Comentarios</h2>
{{--                            <div class="bg-white p-4 rounded-lg shadow-lg">--}}
                            <div class="p-4 md:w-1/2 w-full">
                            @foreach($comentarios as $comentario)
                                    <!-- Comentario-->
                                    <div class="mb-4">
                                        <p class="text-gray-500 text-sm">{{$comentario->nombre_autor}}</p>
                                        <p class="text-gray-500 text-sm mb-2">{{$comentario->correo_autor}}</p>
                                        <span class="text-gray-300 text-sm bg-green-500 p-1">Verificada</span>
                                        <p class="leading-relaxed mb-6 text-sm ">{{$comentario->contenido}}</p>
                                    </div>

                            @endforeach
                            </div>
                        </div>
                        <div class="max-w-2xl p-4">
                            @if ($errors->any())
                                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                    Danger
                                </div>
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                    <p class="font-bold">{{ session('success') }}</p>
                                </div>
                            @endif
                             <h1 class="text-2xl font-semibold mb-4">Deja tu comentario</h1>
                            <!-- Formulario para comentarios -->
                            <form id="form_comentario" action="{{route('receta_comentario')}}" method="POST">
                                <!-- Agrega protección CSRF en Laravel -->
                                @csrf
                                <input type="hidden" name="receta_id" value="{{ $receta->id }}">
                                <!-- Campo de nombre -->
                                <div class="mb-4">
                                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                                </div>
                                <div class="mb-4">
                                    <label for="correo_autor" class="block text-gray-700 font-bold mb-2">Email:</label>
                                    <input type="email" id="correo_autor" name="correo_autor" placeholder="Tu email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                                </div>

                                <!-- Campo de comentario -->
                                <div class="mb-4">
                                    <label for="contenido" class="block text-gray-700 font-bold mb-2">Comentario:</label>
                                    <textarea id="contenido" name="contenido" placeholder="Tu comentario" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                                </div>

                                <!-- Botón de envío -->
                                <div class="r">
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Enviar Comentario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--                @include('web.cucharas')--}}
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formulario = document.getElementById('form_comentario'); // Reemplaza 'tu-formulario' con el ID de tu formulario
        console.log('hola mundo ')
        formulario.addEventListener('submit', function (event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            const nombre = document.getElementById('nombre').value;
            const comentario = document.getElementById('contenido').value;
            const email = document.getElementById('correo_autor').value;

            if (!validator.isLength(nombre, { min: 1, max: 255 })) {
                alert('El nombre es obligatorio y debe tener menos de 255 caracteres.');
                return;
            }

            if (!validator.isLength(comentario, { min: 1 })) {
                alert('El comentario es obligatorio.');
                return;
            }

            if (!validator.isEmail(email)) {
                alert('El correo electrónico ingresado no es válido.');
                return;
            }

            // Si todo está validado correctamente, puedes enviar el formulario aquí
            formulario.submit();
        });
    });
</script>

