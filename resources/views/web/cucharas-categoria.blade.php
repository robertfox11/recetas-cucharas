@extends('web.master')
@section('content')
    <section class="bg-white shadow">
        <div class="container mx-auto">
            <div class="w-full p-4 md:w-1/2 xl:w-1/3 mb-2 mx-4">{{$categoriaNombre}}</div>
            <div id="destados_recetas" class="flex flex-wrap">
                @include('web.cucharas')
            </div>
        </div>
    </section>
@endsection
