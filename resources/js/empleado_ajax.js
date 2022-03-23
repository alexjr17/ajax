
//ocultar mensaje de confimacion para guardar,actualizar y eliminar
$("#message").hide();
//DOM.load
$(document).ready(function() {
    let formulario = document.querySelector("#form");
    let formularioImage = document.querySelector("#form_image");


    //listar
    var tabla = $('#t_empleados').DataTable({
        // "ajax": "{{ route('empleados.index') }}",
        "ajax": "/empleados",
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
            // url: "{{ route('empleados.store') }}",
            url: "/empleados/store",
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
            // url: "{{ route('empleados.imageUpdate') }}",
            url: "/empleados/imageUpdate",
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