<header class="bg-white shadow">
    <div class="w-full grid grid-cols-1 max-w-8xl mx-auto py-4 px-4 sm:px-6 lg:px-4 border border-indigo-400">
        <div class="border border-gray-300 text-center">
            <div class="flex justify-center h-80 ">
                <img class="rounded-lg w-4/5" src="/img/imagen_cuchara.jpg" alt="Recetas Cucharas" width="500" >
            </div>
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu a-->
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-24">
                        <div class="flex">
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex gap-4">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Destacados') }}
                                </x-nav-link>
                                @foreach($categorias as $categoria)
                                    <x-nav-link id="{{$categoria->id}}">
                                        {{ __($categoria->nombre_categoria) }}
                                    </x-nav-link>

{{--                                    <x-nav-link id="{{$categoria->id}}" :href="route('recetas-show-id.show', $categoria->id )" :active="request()->routeIs('recetas-show-id.show', $categoria->id)">--}}
{{--                                        {{ __($categoria->nombre_categoria) }}--}}
{{--                                    </x-nav-link>--}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
