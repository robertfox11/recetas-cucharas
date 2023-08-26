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
                    @if(session('success'))
                        <div class="bg-blue-400">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="container w-full flex flex-wrap mx-auto px-2 pt-4 lg:pt-1 mt-2">
                        <!--Section container-->
                        <section class="w-full lg:w-full">
                            <div id='section2' class="p-2  lg:mt-0 rounded shadow bg-white">
                                <form action="{{ route('recetas.update', $receta->id) }}" method="POST" >
                                    @method('PUT')
                                    @include('recetas.form.form')
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
