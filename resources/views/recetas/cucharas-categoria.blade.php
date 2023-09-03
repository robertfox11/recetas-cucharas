@extends('web.master')
@section('content')
    <section class="bg-white shadow">
        <div class="container mx-auto">
            <div class="w-full px-4 md:w-1/2 xl:w-1/3 border  border-gray-300">{{$categoriaNombre}}</div>
            <div id="destados_recetas"  class="flex flex-wrap">
                @include('recetas.web.cucharas')
            </div>
        </div>
    </section>
@endsection
