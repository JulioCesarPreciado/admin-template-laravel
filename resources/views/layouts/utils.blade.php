<script>
    //Función para remover el loading
    function removeLoading() {
        // habilita el boton
        $('#buscar').attr('disabled', false);
        $('#merchantid').attr('disabled', false);
        $('#merchantOldid').attr('disabled', false);
        $('#stallid').attr('disabled', false);
        $('#name').attr('disabled', false);
        $('#uploadthisphoto').attr('disabled', true);
        // Pone los estilos como habilitado
        $('#buscar').attr('class',
            'bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150'
        );
        // oculta el gif de cargando
        $('#loading').hide();
        $("#text1").show();
    }
    // Función que cambia el comportamiento de la pagina dependiendo si carga o no
    function loading(isLoading) {
        // si esta cargando
        if (isLoading) {
            // deshabilita el boton
            $('#buscar').attr('disabled', true);
            $('#merchantid').attr('disabled', true);
            $('#merchantOldid').attr('disabled', true);
            $('#stallid').attr('disabled', true);
            $('#name').attr('disabled', true);
            $('#tianguis').attr('disabled', true);
            $('#zonas').attr('disabled', true);
            $('#lineas').attr('disabled', true);
            // Pone los estilos como deshabilitado
            $('#buscar').attr('class',
                'bg-green-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none mr-1 opacity-50 cursor-not-allowed'
            );
            $("#text1").show();
            // muestra el gif de cargando
            $('#loading').show();

        } else { //si no esta cargando
            $('#printThisCard').attr('disabled', false);
            // Pone los estilos como habilitado
            $('#buscar').attr('class',
                'bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150'
            );
            $('#printThisCard').attr('class',
                'bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150'
            );
            // oculta el gif de cargando
            $('#loading').hide();
            $("#text1").show();
        }
    }
    //Función para mostrar la imagen
    function showMyImage(fileInput,id) {
        var files = fileInput.files;
        //console.log(files);
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById(id);
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    //Función para generar los pdfs y mostrarlos (Solo funciona para pdf de una persona)
    function loadPdf(id_permisionario, route, path) {
        $.ajax({
            url: route,
            type: "GET",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id_permisionario": $('#merchantid').val()
            },
            success: function(data) {
                //Cargamos el pdf de la compulsa
                $('#mostrar').empty()
                $('#mostrar').append(
                    '<embed src="' + path + '/' + id_permisionario +
                    '.pdf" class="h-96 w-full" style="height: 36.7rem;" type="application/pdf">'
                )
                loading(false)
                $('#botonesBusqueda').empty()
                $('#botonesBusqueda').append(
                    '<button onclick="location.reload()" class="bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button"><div class="flex" id="text1"><p id="textInButton">Nueva busqueda</p><div class="flex justify-end"> <img id="loading" class="object-contain" height="20" width="18" src="{{ asset('img/blue_wait.gif') }}" hidden></div></div></button>'
                    )
                toastr.success('{{ __('Report generated') }}')
            },
            error: function() {
                toastr.warning('{{ __('Something went wrong!') }}')
                loading(false)
            }
        });
    }

    //Función para generar los pdfs y mostrarlos (Solo funciona para pdf de una persona)
    function loadPdfMulti(nombre_tianguis, linea, path) {

                $('#mostrar').empty()
                $('#mostrar').append(
                    '<embed src="' + path + '/' + nombre_tianguis + '_' + linea +
                    '.pdf" class="h-96 w-full" style="height: 36.7rem;" type="application/pdf">'
                )
                loading(false)
                $('#botonesBusqueda').empty()
                $('#botonesBusqueda').append(
                    '<button onclick="location.reload()" class="bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button"><div class="flex" id="text1"><p id="textInButton">Nueva busqueda</p><div class="flex justify-end"> <img id="loading" class="object-contain" height="20" width="18" src="{{ asset('img/blue_wait.gif') }}" hidden></div></div></button>'
                    )


    }

    //Función que llama a la api de los tianguiså
    function getTianguis() {
        loadingCargaInicial(true)
        $.ajax({
            url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=tianguis&id=0",
            type: "GET",
            dataType: 'json',
            success: function(data) {
                data.forEach(element =>
                    $('#tianguis').append('<option value="' + element.id + '">' + element.text +
                        '</option>')
                );
                loadingCargaInicial(false)
            },
            error: function() {
                toastr.warning('{{ __('Something went wrong!') }} al llamar la api');
                loadingCargaInicial(false)
            }
        });
    }
    //Función que llama a la api de las zonas
    function getZonas(id_tianguis) {
        loadingCargaInicial(true)
        $.ajax({
            url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=tianguis&id=" + id_tianguis + "&zona",
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $('#zonas').empty()
                data.forEach(element =>
                    $('#zonas').append('<option value="' + element.zona + '">' + element.zona +
                        '</option>')
                );
                loadingCargaInicial(false)
            },
            error: function() {
                toastr.warning('{{ __('Something went wrong!') }} al llamar la api');
                loadingCargaInicial(false)
            }
        });
    }
    //Función que llama a la api de las lineas
    function getLineas(id_tianguis, zona) {
        loadingCargaInicial(true)
        $.ajax({
            url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=tianguis&id=" + id_tianguis + "&zona=" +
                zona + "&linea",
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $('#lineas').empty()
                data.forEach(element =>
                    $('#lineas').append('<option value="' + element.id + '">' + element.chZonaTianguis +
                        '</option>')
                );
                loadingCargaInicial(false)
            },
            error: function() {
                toastr.warning('{{ __('Something went wrong!') }} al llamar la api');
                loadingCargaInicial(false)
            }
        });
    }
    //Cargamos el select
    $(".select2").select2({
        theme: "bootstrap-5",
    })
    //Función para controlar el loading de la carga inicial
    function loadingCargaInicial(estatus) {
        if (estatus) {
            $('#tianguis').attr('disabled', true);
            $('#zonas').attr('disabled', true);
            $('#lineas').attr('disabled', true);
            $('#loadingMultiple').attr('hidden', false);
        } else {
            $('#tianguis').attr('disabled', false);
            $('#zonas').attr('disabled', false);
            $('#lineas').attr('disabled', false);
            $('#loadingMultiple').attr('hidden', true);
        }
    }
</script>
