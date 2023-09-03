@extends('web.master')
@section('content')
    <section class="bg-white shadow">
        <div class="container mx-auto">
            <div class="w-full px-4 md:w-1/2 xl:w-1/3 border  border-gray-300">Destacados</div>
            <div id="destados_recetas"  class="flex flex-wrap">
                @include('recetas.web.cucharas')
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            cargaRecetas();
            // $(window).keydown(function (event) {
            //     if (event.keyCode === 13) {
            //         cargaUsers();
            //         event.preventDefault();
            //         return false;
            //     }
            // });
        });
        async function cargaRecetas() {
            console.log('hola mundos')
            try {
                res = await axios.get("/recetas-cucharas/all")
                $('#destados_recetas').html(res.data)
            } catch (e) {
                console.log(e)
            }
        }
    </script>
@endsection
