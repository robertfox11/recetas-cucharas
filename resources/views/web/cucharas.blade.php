@if(count($recetas) > 0)
    @foreach($recetas as $receta)
        <div class="w-full px-4 md:w-1/2 xl:w-1/3">
            <div class="mb-10 overflow-hidden rounded-lg bg-white">
                @if ($receta->fotos->count() > 0)
                    <img class="rounded-lg mx-auto object-fill h-96 w-4/5 " src="{{ asset('storage/fotos' . $receta->fotos->first()->url_image) }}" alt="{{ $receta->fotos->first()->titulo }}">
                @endif
                <div class="p-8 tsm:p-9 md:p-7 xl:p-9">
                    <h3 class="text-center ">
                        <a
                            href="javascript:void(0)"
                            class="text-dark hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]"
                        >
                            {{$receta->titulo}}
                        </a>
                    </h3>
                    <p class="text-body-color mb-7 text-base leading-relaxed">
                        {{ Str::limit($receta->descripcion, 160) }}{{ strlen($receta->descripcion) > 150 ? '...' : '' }}
                    </p>
                    <a
                        href="{{route('recetas.show',$receta->url)}}"
                        class="text-body-color hover:border-primary hover:bg-primary inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium transition hover:text-white"
                    >
                        Ver receta
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="mb-10 overflow-hidden rounded-lg bg-white">
            <div class="p-8 tsm:p-9 md:p-7 xl:p-9">
                <h4 class="text-center">No hay recetas</h4>
            </div>

        </div>
    </div>
@endif
