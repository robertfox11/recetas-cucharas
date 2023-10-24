<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu 1-->
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex gap-4">

                    <x-nav-link :href="route('recetas-web.index')" :active="request()->routeIs('recetas-web.index')">
                        {{ __('Home') }}
                    </x-nav-link>
                    @foreach($categorias as $categoria)
                        <x-nav-link
                            :href="route('recetas-by-categoria.id', ['nombre_categoria' => $categoria->nombre_categoria])"
                            :active="request()->route('nombre_categoria') == $categoria->nombre_categoria ? 'active' : ''">
                            {{ __($categoria->nombre_categoria) }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>
