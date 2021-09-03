@extends('templates.template1')
@section('Contenido')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    <h1>Listado de Producttos</h1>
    @if (session("mensaje_exito"))
        <div>
            <strong>
                {{ session("mensaje_exito") }}
            </strong>
        </div>
    @endif
    <table id="Producto" class="table tabe-hover">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Valor</th>
                <th>Ver detalles...</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Productos as $Producto )
                @if($Producto->estado==1)
                    <tr>
                        <td>{{ $Producto->codProd }}  </td>
                        <td>{{ $Producto->nombre }} </td>
                        <td>{{ $Producto->valor }} </td>
                        <td><a href="{{ url('Productos/'.$Producto->idProd ) }}">Ver detalles...</a></td>
                        <td><a href="{{ url('Productos/'.$Producto->idProd.'/edit' ) }}"><button class="btn btn-success">Editar</button></a></td>
                        <td><a href="{{ url('Productos/'.$Producto->idProd.'/inactivar' ) }}"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('Productos/create') }}">Nuevo Producto</a>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('js/Productos.js') }}"></script>

@endsection
