<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recetas') }}
            </div>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col col-2 my-3 py-2">
                <a href="{{url('/')}}"
                   class="font-bold focus:outline-none text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2 py-2.5 mb-2 dark:bg-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-300">
                    App Main</a>
                <a href="{{route('recetas.create')}}"
                   class="font-bold focus:outline-none text-white bg-purple-700 hover:bg-green-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2 py-2.5 mb-2 dark:bg-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-300">
                    <i class="fa-solid fa-plus"></i> Crear Receta</a>
                <a href="{{ route('categoria.create') }}"
                   class="font-bold focus:outline-none text-white bg-purple-700 hover:bg-blue-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2 py-2.5 mb-2 dark:bg-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-300">
                    <i class="fa-solid fa-plus"></i> Crear Categoria</a>
            </div>
            @if (session('success'))
                <div class="bg-blue-500">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Titulo
                            </th>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($recetas as $r)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 border  font-medium whitespace-nowrap ">
                                    {{$r->titulo}}
                                </th>
                                <td class="px-6 py-4 border">
                                    {{$r->categoria->nombre_categoria}}
                                </td>
                                <td class="px-6 py-4 border">
                                    {{$r->descripcion}}
                                </td>
                                <td class="px-2 py-4 border gap-0.5">
                                    <a href="{{route('recetas.edit', $r->id)}}" type="button"
                                       class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2  mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <button type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <i class="fa-solid fa-trash"></i></button>
                                    <button type="button"
                                            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm p-2 mb-2 dark:bg-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-300">
                                        <i class="fa-solid fa-info"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
