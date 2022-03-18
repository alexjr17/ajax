<form id="form" enctype="multipart/form-data">
    <input type="text" name="id" id="id" class="hidden">
    <div class="form-group">
        <label for="">nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control nombre" placeholder="ingrese nombre">
        <small id="error_nombre" class="text-sm text-danger"></small>
    </div>
    <div class="form-group">
        <label for="">correo</label>
        <input type="text" name="correo" id="correo" class="form-control" placeholder="ingrese correo"
            aria-describedby="helpId">
        <small id="error_correo" class="text-sm text-danger"></small>
    </div>
    <div class="form-group">
        <label for="">Sexo</label>
        <div class="form-check d-flex">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="sexo" id="sexo1" value="Hombre">
                Hombre
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="sexo" id="sexo2" value="Mujer">
                Mujer
            </label>
        </div>
        <small id="error_sexo" class="text-sm text-danger"></small>
    </div>

    <div class="form-group">
        <label for="descripcion">descripcion</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
        <small id="error_descripcion" class="text-sm text-danger"></small>
    </div>

    <div class="form-group">
        <label for="area">roles</label>
        <select class="form-control" name="area" id="area">
            <option selected class="d-none" value="">Selecione un area</option>
            @foreach ($areas as $area)
                <option value="{{ $area }}">{{ $area }}</option>
            @endforeach
        </select>
        <small id="error_area" class="text-sm text-danger"></small>
    </div>
    <br>
    <div class="form-group" id="inputFile">
        <label for="file">imagen</label>
        <input type="file" name="file" id="file" accept="image/*">
        <small id="error_imagen" class="text-muted"></small>
    </div>
</form>
