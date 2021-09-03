@extends('templates.template');
@section('Contenido');
<form method="POST" action="{{ url('Marcas') }}" class="form-horizontal">
    @csrf
    <div>
        <form action="Marcas/create" method="POST" enctype="multipart/form-data">
            @csrf
            <legend>Crear Marca </legend>
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nombre</label>
                <input value="{{ old('nombre') }}" name="nombre" type="text"  class="form-control input-md">
                <strong class="alert-danger"> {{ $errors->first('nombre') }} </strong>

                <label class="col-md-4 control-label" for="textinput">Estado</label>
                <select name="estado" class="form-control input-md">
                    <option value="1"> Activo </option>
                    <option value="2"> Inactivo </option>
                </select>
                <strong class="alert-danger"> {{ $errors->first('estado') }} </strong>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Cerar</button>
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</form>
@endsection
