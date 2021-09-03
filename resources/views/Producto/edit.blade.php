@extends('templates.template');
@section('Contenido');

<form method="POST" action="{{ url('Productos/'.$Producto->idProd ) }}" class="form-horizontal" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div>

            @csrf
            <legend>Crear Producto</legend>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Codigo:</label>
                <input value="{{ $Producto->codProd }}" name="codigo" type="text" class="form-control" id="recipient-name">
                <strong class="alert-danger"> {{ $errors->first('codigo') }} </strong>

                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <input value="{{ $Producto->nombre }}" name="nombre" type="text" class="form-control" id="recipient-name">
                <strong class="alert-danger"> {{ $errors->first('nombre') }} </strong>

                <label for="recipient-name" class="col-form-label">Valor:</label>
                <input value="{{ $Producto->valor }}" name="valor" type="number" class="form-control" id="recipient-name">
                <strong class="alert-danger"> {{ $errors->first('valor') }} </strong>

                <label for="recipient-name" class="col-form-label">Url Imagen:</label>
                <input value="{{ $Producto->urlImagen }}" name="imagen" type="file" class="form-control" id="recipient-name" accept="image/pnj,image/jpg,image/jpeg,image/gif">
                <strong class="alert-danger"> {{ $errors->first('imagen') }} </strong>


                <label for="recipient-name" class="col-form-label">Stock:</label>
                <input value="{{ $Producto->stock }}" name="stock" type="number" class="form-control" id="recipient-name">
                <strong class="alert-danger"> {{ $errors->first('stock') }} </strong>

                <label for="recipient-name" class="col-form-label">Estado:</label>
                <select value="{{ $Producto->estado }}" name="estado"  class="form-control" id="recipient-name">
                    <option value="1"> Activo </option>
                    <option value="2"> Inactivo </option>
                </select>
                <strong class="alert-danger"> {{ $errors->first('estado') }} </strong>

                <label for="recipient-name" class="col-form-label">Categoria:</label>
                <select  name="categoria" class="form-control" id="recipient-name">
                    @foreach ( $Categorias as $Categoria)
                        <option value="{{ $Categoria->idCat }}"
                            @if ($Categoria->idCat == $Producto->idCat)
                                selected
                            @endif
                            > {{ $Categoria->NombreCat }}
                        </option>
                    @endforeach
                </select>
                <strong class="alert-danger"> {{ $errors->first('categoria') }} </strong>

                <label for="recipient-name" class="col-form-label">Marca:</label>
                <select  name="marca" class="form-control" id="recipient-name">
                    @foreach ( $Marcas as $Marca)
                        <option value="{{ $Marca->idMar }}"
                            @if ($Marca->idMar == $Producto->idMar)
                                selected
                            @endif
                            > {{ $Marca->NombreMar }}
                        </option>
                    @endforeach
                </select>
                <strong class="alert-danger"> {{ $errors->first('marca') }} </strong>

            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Cerar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

    </div>
</form>

@endsection
