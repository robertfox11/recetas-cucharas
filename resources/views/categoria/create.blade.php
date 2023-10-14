<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recetas') }}
            </div>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border border-indigo-400">
            <div class="col col-2 my-3 py-2">
                <a href="{{route('recetas')}}" class="font-bold focus:outline-none text-white bg-purple-700 hover:bg-green-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-2 py-2.5 mb-2 dark:bg-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-300">Volver</a>
            </div>
            @if (session('success'))
                <div class="bg-blue-500">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container w-full flex flex-wrap mx-auto px-2 pt-4 lg:pt-1 mt-2">
                <!--Section container-->
                <section class="w-full lg:w-full">
                    <div id='section2' class="p-2  lg:mt-0 rounded shadow bg-white">
                        <form action="{{ route('categoria.store') }}" method="POST">
                            @include('categoria.form')
                        </form>
                    </div>
                </section>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Categoría
                            </th>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Creado
                            </th>
                            <th scope="col" class="px-6 py-3 text-blue-500">
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categorias as $cat)
                            <tr class="bg-white border-b" >
                                <th scope="row" class="px-6 py-4 border  font-medium whitespace-nowrap gap-4">
                                    <input id="nombre_categoria{{$cat->id}}" value="{{$cat->nombre_categoria}}" readonly>
                                </th>
                                <td class="px-6 py-4 border">
                                    {{$cat->created_at}}
                                </td>
                                <td class="grid grid-cols-2 px-2 py-4 border gap-1 text-center gap-x-2">
                                    <button  id="eliminarCategoria{{$cat->id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-solid fa-trash"></i></button>
                                    <button  onclick="editarCategoria({{$cat->id}})" type="button" id="editarCategoria{{$cat->id}}" class="focus:outline-none text-white bg-green-700 hover:bg-white focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2  mb-2 dark:bg-green-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-regular fa-pen-to-square"></i></button>
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
<script>
    function editarCategoria(id) {
        inputValue = $("#nombre_categoria"+id)
        console.log('id')
        inputValue.prop('readonly', false)
        inputValue.keypress(function (e) {
            if (e.which == 13) {
                console.log(e.target.value);
                let categoriaActualizada = e.target.value
                updateCategoria(categoriaActualizada, id)
            }
        });
    }

    async  function updateCategoria(categoriaNew, id){
        let data = {
            id : id,
            categoriaNew : categoriaNew
        }
        try {
            let res = await axios.post('/update-categoria', data);
            alert(res.data.message)
            location.reload();
        } catch (e) {
            console.log(e)
        }
    }

</script>
