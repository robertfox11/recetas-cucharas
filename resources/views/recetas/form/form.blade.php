@csrf
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="titulo">
            Titulo
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" id="titulo" name="titulo" type="text" value="{{ old('titulo', $receta->titulo) }}">
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>

<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="categoria_id"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Categoría
        </label>
    </div>
    <div class="md:w-2/3">
        <select id="categoria_id" name="categoria_id" class="form-select block w-full focus:bg-white">
            @foreach($categorias as $categoria)
                <option {{ old("categoria_id", $receta->categoria_id) == $categoria->id ? "selected": "" }}  value="{{$categoria->id}}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>

<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="descripcion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">
            Descripción
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea class="form-textarea block w-full focus:bg-white" name="descripcion" id="descripcion" rows="8">{{ old('descripcion', $receta->descripcion) }}</textarea>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="instrucciones_preparacion" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Instrucciones de preparación
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea name="instrucciones_preparacion" class="form-textarea block w-full focus:bg-white"  wrap="soft" id="instrucciones_preparacion" rows="8" >{{ old('instrucciones_preparacion', $receta->instrucciones_preparacion) }}</textarea>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tiempo_preparacion">
            Tiempo de preparación
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="tiempo_preparacion" id="tiempo_preparacion" type="number" min="0" max="999" value="{{ old('tiempo_preparacion', $receta->tiempo_preparacion) }}" >
        <p class="py-2 text-sm text-gray-600">Tiempo de Preparación (minutos)</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tiempo_coccion">
            Tiempo de Cocción
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="tiempo_coccion" id="tiempo_coccion" type="number" min="0" max="999" value="{{ old('tiempo_coccion', $receta->tiempo_coccion) }}">
        <p class="py-2 text-sm text-gray-600">Tiempo de Cocción (minutos)</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="porciones">
            Porciones
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="form-input block w-full focus:bg-white" name="porciones" id="porciones" type="number" value="{{ old('porciones', $receta->porciones) }}">
        <p class="py-2 text-sm text-gray-600">Porciones</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="dificultad"  class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">
            Dificultad
        </label>
    </div>
    <div class="md:w-2/3">
        <select id="dificultad" name="dificultad" class="form-select block w-full focus:bg-white" >
            @foreach($dificultadades as $df)
                <option {{ old("dificultad") == $df ? "selected": "" }}  value="{{$df}}">{{$df}}</option>
            @endforeach
        </select>
        <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3">
        <label for="ingredientes" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
            Ingredientes
        </label>
    </div>
    <div class="md:w-2/3">
        <textarea name="ingredientes" class="form-textarea block w-full focus:bg-white" id="ingredientes" rows="8">{{ old('ingredientes', $ingredientesNombres) }}</textarea>
        <small class="form-text text-muted">Ingrese los ingredientes separados por saltos de línea o comas.</small>
    </div>
</div>
<div id="divFicheros"
     class="flex flex-col w-full mt-2 items-start justify-start bg-grey-lighter relative py-1.5 sm:p-0 lg:p-0 md:p-0">
    @error('foto[]')
    <p class="bg-red-100 rounded-lg mb-1 text-xs text-red-700 inline-flex items-center"
       role="alert">{{ $message}}</p>
    @enderror
    {{--    <div class="md:w-1/3">--}}
    {{--        <label for="uploadImage" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >--}}
    {{--            Imagenes--}}
    {{--        </label>--}}
    {{--    </div>--}}
    <div class="md:w-2/3">
        <input type="file" id="uploadImage" name="foto[]" multiple
               class="campo block w-full text-sm text-gray-900  rounded-xlg cursor-pointer focus:outline-none form-control">
    </div>
    <div id="pic_box" class="flex justify-center rounded-lg ml-auto w-full mt-2">
        <div class="container p-2 mx-auto lg:pt-5 lg:px-32 lg:p-2 md:px-0 ">
            <div id="imagebox" class="flex flex-wrap -m-1 md:-m-2">
{{--                <div id="" class="selImg flex  w-full lg:w-1/3 md:w-1/2 sm:w-1/2 p-0.5" >--}}
{{--                    @foreach($fotos as $foto)--}}

{{--                    <div class="w-full lg:p-1 p-1 md:p-2 border border-gray-200 rounded-lg">--}}
{{--                        <button onclick="" type="button" class="btndelete lg:p-1 md:p-1 p-1 absolute bg-gray-200 opacity-80 m-1 rounded-xl text-xs text-red-500"><i class="fa-solid fa-trash-can"></i></button>--}}
{{--                        <img class="block p-0 lg:px-0 object-fill object-center w-full h-full  rounded-lg "--}}
{{--                             src="{{ Storage::url($foto->url) }}" alt="image">--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<div class="md:flex mb-6">
    <div class="md:w-1/3"></div>
    <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Save
    </button>
</div>
<script defer>
    const recetaId = @json($receta->id);
    // var divFichero = document.getElementById('divFicheros');
    const fotos =  @json($fotos);
    let imgArrleng = fotos.length;//capturamo el tamaño del array
    var imagenesArr = [...fotos];
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                return false;
            }
        });
        if (imgArrleng > 0) {
            // vistaPrev.style.display = "block"
            //mostramos imagenes y agregamos el text para mostrar
            let textStorage = '/storage/';
            for (let i in imagenesArr) {
                imagenesArr[i]['text'] = textStorage
            }
            // carouselMini.addClass("hidden")
            imagenesPrecargada(imagenesArr)
        }
        //detecta si hay cambios
        $(".campo").change(function () {
            $('[name="enviar"]').prop('disabled', false);
        });
        // valida el total de precio de puntos
        // var input = document.getElementById('precio_puntos');
        // input.addEventListener('input', function () {
        //     if (this.value.length > 5) {
        //         // alert("Solo puede tener de longitud 5")
        //         this.value = this.value.slice(0, 5);
        //     }
        // })
    })
    $("#uploadImage").on("change", function () {
        //Al cargar imagenes la guardamos en el array para enviar el array actualizado
        let uploadImgLenght = this.files.length - 1;
        for (var i = 0; i <= uploadImgLenght; i++) {
            var objUrl = getObjectURL(this.files[i]);
            imagenesArr.push({'url_image': objUrl, 'text': ''});
        }
        imagenesPrecargada(imagenesArr)
    });


    function getObjectURL(file) {// Obtener URL IMG
        var url = null;
        if (window.createObjectURL != undefined) { // basic
            url = window.createObjectURL(file);
        } else if (window.URL != undefined) {
            // mozilla(firefox)
            url = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) {
            // webkit or chrome
            url = window.webkitURL.createObjectURL(file);
        }
        return url;
    }
    /**Vista previa imagenes precargadas carousel*/
    // function vistaPrevia() {
    //     //Mostrar y ocultar el carousel mini
    //     let existeHidden = carouselMini.is(':hidden');
    //     if (existeHidden) {
    //         cargarImagenesCarouselmini(null)
    //         carouselMini.fadeIn("slow");
    //     } else {
    //         carouselMini.fadeOut("slow");
    //     }
    // }

    // function cargarImagenesCarouselmini(htmlCarousel) {
    //     /**Muestra imagenes en carousel*/
    //     var slideCataRegaloWidth = $("#imgCatalogoRegalo" + recetaId + " img").width()
    //     var slideWidth = $("#slider-carousel" + recetaId).width()
    //     var sizeLeftorRigth = slideWidth < 5 ?slideWidth=0:((slideWidth - slideCataRegaloWidth) / 2)
    //     sizeLeftorRigth = (sizeLeftorRigth > 10) ? sizeLeftorRigth - 15 : sizeLeftorRigth;
    //     if (htmlCarousel != null){
    //         imgCatalogoRegalo.html(htmlCarousel)
    //     }
    //     $("#imgCatalogoRegalo" + recetaId + " img:first-child").removeClass(['absolute', 'opacity-0']).addClass('static')
    //     $("#imgCatalogoRegalo" + recetaId).css("left", "")
    //     $("#slider-carousel" + recetaId + " button:nth-child(2)").css({"left": sizeLeftorRigth})
    //     $("#slider-carousel" + recetaId + " button:nth-child(3)").css({"right": sizeLeftorRigth})
    // }

    function imagenesPrecargada(imgArr) {
        //imagenes precargardas en vista previa
        let html = '';
        for (var i = 0; i < imgArr.length; i++) {
            var imgImagen = new String(imgArr[i]['url_image']);
            html += `<div id="selImg${i}" class="selImg flex  w-full lg:w-1/3 md:w-1/2 sm:w-1/2 p-0.5" >
                                        <div class="w-full lg:p-1 p-1 md:p-2 border border-gray-200 rounded-lg">
                                            <button onclick="btnDelete(${imgArr[i]['id']},'${imgImagen}')" data-id="${imgImagen}" type="button" class="btndelete lg:p-1 md:p-1 p-1 absolute bg-gray-200 opacity-80 m-1 rounded-xl text-xs text-red-500"><i class="fa-solid fa-trash-can"></i></button>
                                            <img class="block p-0 lg:px-0 object-fill object-center w-full h-full  rounded-lg " src="${imgArr[i]['text']}${imgImagen}" alt="image">
                                        </div>
                                   </div>`;
        }
        // Obtener la ruta de la imagen, la ruta no es la ruta local de la imagen
        if (typeof imgArr !== 'undefined') {
            $('#imagebox').show()
            $('#imagebox').html(html);
        } else {
            $('#imagebox').hide()
            return
        }
    }
    async function btnDelete(id, imagen = 'hola'){
        document.querySelectorAll('.btndelete')//se actualiza los botones en js
        let respuesta = confirm("Estas seguro de eliminar este elemento")
        let data = {
            id : id,
            regalo_image : imagen
        }
        if (respuesta) {
            let existe = imagenesArr.some(imgRegalo => imgRegalo.imagen === data.imagen)
            if (id != undefined) {
                try {
                    let res = await axios.post('/delete-receta', data);
                    location.reload();
                } catch (e) {
                    console.log(e)
                }
            }
            if (existe) {
                // eliminarElementos (condicionEliminar(imagenesArr, imagen));
                imagenesArr = imagenesArr.filter((item) => item.url_image !== imagen);
                imagenesPrecargada(imagenesArr)
                if (imagenesArr.length == 0) {
                    //ocultamos el carousel si no tiene datos
                    // carouselMini.css({'display': 'none'})
                    // document.getElementById("carouselMini").style.display = "none";
                    // vistaPrev.style.display = "none"
                }
            }
            alert("se ha actualizado correctamente")
            return
        }

    }
</script>
