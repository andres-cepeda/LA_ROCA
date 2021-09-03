@extends('templates.template');
@section('Contenido');
<form method="POST" action="{{ url('Productos') }}" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div>
            @csrf
            <legend>Crear Producto </legend>
            <div class="form-group">
                <div class="form-group">

                    <label for="recipient-name" class="col-form-label">Codigo:</label>
                    <input value="{{ old('codigo') }}" name="codigo" type="text" class="form-control" id="recipient-name">
                    <strong class="alert-danger"> {{ $errors->first('codigo') }} </strong>

                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    <input value="{{ old('nombre') }}" name="nombre" type="text" class="form-control" id="recipient-name">
                    <strong class="alert-danger"> {{ $errors->first('nombre') }} </strong>

                    <label for="recipient-name" class="col-form-label">Valor:</label>
                    <input value="{{ old('valor') }}" name="valor" type="number" class="form-control" id="recipient-name">
                    <strong class="alert-danger"> {{ $errors->first('valor') }} </strong>

                    <label for="recipient-name" class="col-form-label">Url Imagen:</label>
                    <input name="imagen" type="file" class="form-control" id="recipient-name" accept="image/pnj,image/jpg,image/jpeg,image/gif">
                    <strong class="alert-danger"> </strong>

                    <label for="recipient-name" class="col-form-label">Stock:</label>
                    <input value="{{ old('stock') }}" name="stock" type="number" class="form-control" id="recipient-name">
                    <strong class="alert-danger"> {{ $errors->first('stock') }} </strong>

                    <label for="recipient-name" class="col-form-label">Estado:</label>
                    <select name="estado"  class="form-control" id="recipient-name">
                        <option value="1"> Activo </option>
                        <option value="2"> Inactivo </option>
                    </select>
                    <strong class="alert-danger"> {{ $errors->first('estado') }} </strong>

                    <label for="recipient-name" class="col-form-label">Categoria:</label>
                    <select  name="categoria" class="form-control" id="recipient-name">
                        @foreach ( $Datos->Categoria as $Categoria)
                            <option value="{{ $Categoria->idCat }}"> {{ $Categoria->NombreCat }} </option>
                        @endforeach
                    </select>
                    <strong class="alert-danger"> {{ $errors->first('categoria') }} </strong>

                    <label for="recipient-name" class="col-form-label">Marca:</label>
                    <select name="marca" class="form-control" id="recipient-name">
                        @foreach ( $Datos->Marca as $Marca)
                            <option value="{{ $Marca->idMar }}"> {{ $Marca->NombreMar }} </option>
                        @endforeach
                    </select>
                    <strong class="alert-danger"> {{ $errors->first('marca') }} </strong>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </div>
</form>
@endsection
