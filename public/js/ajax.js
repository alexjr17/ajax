$(document).ready(function () {
    let formulario = document.querySelector("#form");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // console.log(formulario.nombre.value);
    var tabla = $('#t_empleados').DataTable({
        "ajax": "/empleados/index",
        "columns": [{
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
            render: function (data, type, row) {
                return `<button data-id="${data.id}" class="btn btn-primary edit" id="edit">edit</button>`;
            }
        },
        ]
    });

    $('#submit').on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('empleados.store') }}",
            data: $('#form').serialize(),
            dataType: "json",
            success: function (response) {
                formulario.reset();
                tabla.ajax.reload();
                $('#modal_empleados').modal('hide');
                $(".message").text(response.message);
                $("#message").removeClass("d-none");
                formulario.reset();
            },
            error: function (errors) {
                // console.log(errors);
                $("#error_nombre").text(errors.responseJSON.errors.nombre);
                $("#error_correo").text(errors.responseJSON.errors.correo);
                $("#error_sexo").text(errors.responseJSON.errors.sexo);
                $("#error_area").text(errors.responseJSON.errors.area);
                $("#error_descripcion").text(errors.responseJSON.errors.descripcion);

            }
        });
    });


    $(document).on('click', "button.edit", function () {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/empleados/" + id + "/edit",
            dataType: "json",
            success: function (response) {
                console.log(response);
                formulario.nombre.value = response.nombre;
                formulario.correo.value = response.correo;
                formulario.sexo.value = response.sexo;
                formulario.area.value = response.area;
                formulario.descripcion.value = response.descripcion;
                $('#modal_empleados').modal('show');
            },
            error: function (errors) {
                console.log(errors);
            }
        });
    });

    // ocultar y mostrar modal
    $('.close').on('click', function (e) {
        $('#modal_empleados').modal('hide');
    });
    $('.mostrar').on('click', function (e) {
        $('#modal_empleados').modal('show');
        
    });
});