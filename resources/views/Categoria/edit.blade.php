@extends('templates.template');
@section('Contenido');

<form method="POST" action="{{ url('Categorias/'.$Categoria->idCat ) }}" class="form-horizontal">
    @method('PUT')
    @csrf

    <div>
        <form action="Productos/create" method="POST" enctype="multipart/form-data">
            @csrf
            <legend>Crear Categoria </legend>
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nombre</label>
                <input value="{{ $Categoria->NombreCat }}" name="nombre" type="text" class="form-control input-md">
                <strong class="alert-danger"> {{ $errors->first('nombre') }} </strong>

                <label class="col-md-4 control-label" for="textinput">Estado</label>
                <select value="{{ $Categoria->estado }}" name="estado"  class="form-control" id="recipient-name">
                    <option value="1"> Activo </option>
                    <option value="2"> Inactivo </option>
                </select>
                <strong class="alert-danger"> {{ $errors->first('estado') }} </strong>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Cerar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</form>

@endsection
