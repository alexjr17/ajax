<x-app>

    <button class="btn btn-primary btn_modal mostrar" id="modal_guardar">+</button>crear nuevo

    <table id="t_empleados" class="display table table-success table-striped" style="">
        <thead>
            <tr>
                <th>N°</th>
                <th>imagen</th>
                <th>nombre</th>
                <th>correo</th>
                <th>sexo</th>
                <th>area</th>
                <th>descripcion</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <x-modal id="modal_image">
        {{-- slot --}}
        @include('empleado.partials.form-image')
        @slot('buttons')
            <button type="button" class="btn btn-primary" id="btnUpdateImage">actualizar</button>
            <button type="button" class="btn btn-danger" id="btnDeleteImage">Eliminar</button>
            <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        @endslot
    </x-modal>

    <x-modal id="modal_empleados">
        {{-- slot --}}
        @include('empleado.partials.form')

        @slot('buttons')
            <button type="button" class="btn btn-primary" id="submit">Guardar</button>
            <button type="button" class="btn btn-danger" id="actualizar">Actualizar</button>
            <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        @endslot
    </x-modal>

</x-app>
