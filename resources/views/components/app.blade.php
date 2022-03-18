<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-white pt-8 rounded-lg">
            <div class="alert alert-success" id="message" role="alert">
                <h4 class="alert-heading"></h4>
                <p class="mb-0 message"></p>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>

{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>
<style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>

{{-- script bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
{{-- script datatble --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    //ocultar mensaje de confimacion para guardar,actualizar y eliminar
    $("#message").hide();
    //DOM.load
    $(document).ready(function() {
        let formulario = document.querySelector("#form");
        let formularioImage = document.querySelector("#form_image");


        //listar
        var tabla = $('#t_empleados').DataTable({
            "ajax": "{{ route('empleados.index') }}",
            "columns": [{
                    data: 'id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (data.file == '') {
                            return `<img class="h-10 w-10 rounded-full" data-id="${data.id}" data="${data.file}"
                                                src="" alt="" id="image">`;
                        } else {
                            return `<img class="h-10 w-10 rounded-full" data-id="${data.id}" data="${data.file}"
                                                src="${data.file}" alt="" id="image">`;
                        }

                    }
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'correo'
                },
                {
                    data: 'sexo'
                },
                {
                    data: 'area'
                },
                {
                    data: 'descripcion'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button data-id="${data.id}" data-nombre="${data.nombre}"class="btn btn-primary modal_edit" id="edit">edit</button>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button data-id="${data.id}" data-nombre="${data.nombre}"class="btn btn-danger eliminar" id="eliminar">eliminar</button>`;
                    }
                },
            ]
        });
        //guardar
        $('#submit').on('click', function(e) {
            // var files = document.getElementById('file').files[0];
            var formData = new FormData($("#form")[0]);
            console.log(formData.get("file"));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('empleados.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    formulario.reset();
                    tabla.ajax.reload(function() {
                        $(".paginate_button > a").on(
                            "focus",
                            function() {
                                $(this).blur();
                            });
                    }, false);
                    $('#modal_empleados').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    });
                    // $(".message").text(response.message);
                    // $("#message").show();
                    // setTimeout("$('#message').hide();", 4000);
                },
                error: function(errors) {
                    error(errors);
                }
            });
        });
        //editar
        $(document).on('click', '#edit', function() {
            var id = $(this).data('id');
            console.log(id);
           $('#inputFile').addClass('hidden');
            var nombre = $(this).data('nombre');
            console.log(nombre);
            $.ajax({
                type: "GET",
                url: "/empleados/" + id + "/edit",
                dataType: "json",
                success: function(response) {
                    formulario.reset();
                    console.log(response);
                    formulario.id.value = response.id;
                    formulario.nombre.value = response.nombre;
                    formulario.correo.value = response.correo;
                    formulario.sexo.value = response.sexo;
                    formulario.area.value = response.area;
                    formulario.descripcion.value = response.descripcion;
                    $('#modal_empleados').modal('show');
                },
                error: function(errors) {
                    console.log(errors);
                }
            });
        });
        //actualizar
        $(document).on('click', '#actualizar', function() {
            swal({
                    title: "Actualizar!",
                    text: "Desea Actualizar a " + formulario.nombre.value,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formData = new FormData($("#form")[0]);
                        console.log(formData.get("file"));
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "PATCH",
                            url: "/empleados/" + formData.get("id"),
                            data: $('#form').serialize(),
                            _method: "PATCH",
                            dataType: "json",
                            success: function(response) {
                                formulario.reset();
                                tabla.ajax.reload(function() {
                                    $(".paginate_button > a").on(
                                        "focus",
                                        function() {
                                            $(this).blur();
                                        });
                                }, false);
                                $('#modal_empleados').modal('hide');
                                swal(response.message, {
                                    icon: "success",
                                });
                            },
                            error: function(errors) {
                                error(errors);
                            }
                        });
                    }
                });
        });

        //actualizar imagen
        $(document).on('click', '#image', function() {
            formularioImage.reset();
            $("#error_file").hide();
            $('#modal_image').modal('show');
            console.log($(this).data('id'));
            formularioImage.id.value = $(this).data('id');
        });
        $(document).on('click', '#btnUpdateImage', function() {
            let formData = new FormData($('#form_image')[0]);
            console.log(formData.get('file_update'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('empleados.imageUpdate') }}",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    tabla.ajax.reload(function() {
                        $(".paginate_button > a").on(
                            "focus",
                            function() {
                                $(this).blur();
                            });
                    }, false);
                    console.log(response);
                    swal(response.message, {
                            icon: "success",
                        });
                    $('#modal_image').modal('hide');

                },
                error: function(errors) {
                    console.log(errors.responseJSON.errors);
                    if (errors.responseJSON.errors.file) {
                        $("#error_file").text(errors.responseJSON.errors.file).show();
                    } else {
                        $("#error_file").hide();
                    }
                }
            });

        });

        //eliminar imagen
        $(document).on('click', '#btnDeleteImage', function() {
            let formData = new FormData($('#form_image')[0]);
            var id = formData.get('id');
            console.log(formData.get('id'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "delete",
                url: "empleados/imageDestroy/" + id,
                data: id,
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        });
                        tabla.ajax.reload(function() {
                        $(".paginate_button > a").on(
                            "focus",
                            function() {
                                $(this).blur();
                            });
                    }, false);

                    }
                    if (response.status == 404) {
                        swal(response.message, {
                            icon: "warning",
                        });
                    }
                    
                }
            });
        });

        //eliminar
        $(document).on('click', '#eliminar', function() {
            var nombre = $(this).data('nombre');
            var id = $(this).data('id');
            swal({
                    title: "Eliminar!",
                    text: "Desea aliminar a " + nombre,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "delete",
                            url: "/empleados/" + id,
                            data: id,
                            dataType: "json",
                            success: function(response) {
                                tabla.ajax.reload(function() {
                                    $(".paginate_button > a").on(
                                        "focus",
                                        function() {
                                            $(this).blur();
                                        });
                                }, false);
                                console.log(response);
                                swal(response.message, {
                                    icon: "success",
                                });
                            }
                        });

                    }
                });
        });

        // ocultar y mostrar modal
        $(document).on('click', '.close', function(e) {
            $('#modal_empleados').modal('hide');
            $('#modal_image').modal('hide');
        });
        $(document).on('click', '#modal_guardar', function(e) {
            $('#modal_empleados').modal('show');
            $("#submit").show();
            $("#actualizar").hide();
            formulario.reset();
            $('#inputFile').removeClass('hidden');

            error();
        });
        $(document).on('click', '.modal_edit', function(e) {
            $('#modal_empleados').modal('show');
            $("#actualizar").show();
            $("#submit").hide();
            error();
        });

        //functions
        //erores campos requeridos
        function error(errors) {
            if (errors) {
                // console.log(errors);
                if (errors.responseJSON.errors.nombre) {
                    $("#error_nombre").text(errors.responseJSON.errors.nombre).show();
                } else {
                    $("#error_nombre").hide();
                }
                if (errors.responseJSON.errors.correo) {
                    $("#error_correo").text(errors.responseJSON.errors.correo).show();
                } else {
                    $("#error_correo").hide();
                }
                if (errors.responseJSON.errors.sexo) {
                    $("#error_sexo").text(errors.responseJSON.errors.sexo).show();
                } else {
                    $("#error_sexo").hide();
                }
                if (errors.responseJSON.errors.area) {
                    $("#error_area").text(errors.responseJSON.errors.area).show();
                } else {
                    $("#error_area").hide();
                }
                if (errors.responseJSON.errors.descripcion) {
                    $("#error_descripcion").text(errors.responseJSON.errors.descripcion).show();
                } else {
                    $("#error_descripcion").hide();
                }
            } else {
                $("#error_nombre").hide();
                $("#error_correo").hide();
                $("#error_sexo").hide();
                $("#error_area").hide();
                $("#error_descripcion").hide();

            }

        }
    });
</script>

</html>
