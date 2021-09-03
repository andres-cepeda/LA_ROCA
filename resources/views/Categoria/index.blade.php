@extends('templates.template');
@section('Contenido')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <h1>Listado de Categorias</h1>
    @if (session("mensaje_exito"))
        <div>
            <strong>
                {{ session("mensaje_exito") }}
            </strong>
        </div>
    @endif
    <table id="Categoria" class="table tabe-hover">
        <thead>
            <tr>
                <th class="table-active">Nombre</th>
                <th>Ver detalles...</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Categorias as $Categoria )
                @if($Categoria->estado==1)
                    <tr>
                        <td>{{ $Categoria->NombreCat }} </td>
                        <td><a href="{{ url('Categorias/'.$Categoria->idCat ) }}">Ver detalles...</a></td>
                        <td><a href="{{ url('Categorias/'.$Categoria->idCat.'/edit' ) }}"><button class="btn btn-success">EDITAR</button></a></td>
                        <td><a href="{{ url('Categorias/'.$Categoria->idCat.'/inactivar' ) }}"><button class="btn btn-danger">ELIMINAR</button></a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('Categorias/create') }}">Nueva Categoria</a>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('js/Categorias.js') }}"></script>


@endsection
